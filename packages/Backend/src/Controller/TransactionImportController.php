<?php
namespace Solidarity\Backend\Controller;

use GuzzleHttp\Psr7\UploadedFile;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Solidarity\Delegate\Service\Delegate;
use Solidarity\Donor\Service\Donor;
use Solidarity\Educator\Service\Educator;
use Solidarity\Educator\Service\EducatorImport;
use Solidarity\Mailer\Service\Mailer;
use Solidarity\Transaction\Service\Round;
use Solidarity\Transaction\Service\Transaction;
use Solidarity\Transaction\Service\TransactionImport;
use Skeletor\Core\Controller\AjaxCrudController;
use GuzzleHttp\Psr7\Response;
use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Tamtamchik\SimpleFlash\Flash;
use Turanjanin\SerbianTransliterator\Transliterator;

class TransactionImportController extends AjaxCrudController
{
    const TITLE_VIEW = "View transactions";
    const TITLE_CREATE = "Create new transaction";
    const TITLE_UPDATE = "Edit transaction: ";
    const TITLE_UPDATE_SUCCESS = "Transaction updated successfully.";
    const TITLE_CREATE_SUCCESS = "Transaction created successfully.";
    const TITLE_DELETE_SUCCESS = "Transaction deleted successfully.";
    const PATH = 'Transaction';

    const MAX_DONATIONS = 5;
    const MAX_DONATION_AMOUNT = 30000;

    /**
     * @param TransactionImport $service
     * @param Session $session
     * @param Config $config
     * @param Flash $flash
     * @param Engine $template
     */
    public function __construct(
        TransactionImport $service, Session $session, Config $config, Flash $flash, Engine $template,
        private Donor $donor, private EducatorImport $educator, private Round $round,
        private Mailer $mailer, private \Solidarity\Educator\Filter\Educator $educatorFilter, private Delegate $delegate
    ) {
        parent::__construct($service, $session, $config, $flash, $template);
        $this->tableViewConfig['createButton'] = false;
    }

    public function form(): Response
    {

        return parent::form();
    }

    public function create(): Response
    {
        die('disabled');
    }

    public function getEntityData()
    {
        $this->getResponse()->getBody()->write(json_encode($this->service->getEntityData(
            (int) $this->getRequest()->getAttribute('id'), $this->getRequest()->getQueryParams()['currency']
        )));
        $this->getResponse()->getBody()->rewind();

        return $this->getResponse()->withHeader('Content-Type', 'application/json');
    }

    public function importForm()
    {
        return $this->respond('upload');
    }

    public function import()
    {
        ini_set('max_execution_time', 3600);
        ini_set('memory_limit', '512M');

        $uploadedFile = $this->getRequest()->getUploadedFiles()['file'];
        $uploadedFile->moveTo(DATA_PATH . '/' . $uploadedFile->getClientFilename());

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $sourceFile = DATA_PATH . '/' . $uploadedFile->getClientFilename();
        $excel = $reader->load($sourceFile);

//        $excel = $reader->load(DATA_PATH . '/import/lista-uplata-po-donatorima-8.xlsx');
        $failedData = [];
        $failedEducatorsTrx = [];
        foreach ($excel->getSheet($excel->getFirstSheetIndex())->toArray() as $key => $data) {
            if ($key === 0) {
                continue;
            }
            if (!$data[3]) {
                break;
            }
            $name = Transliterator::toLatin($data[1]);
            $accountNumber = $this->normalizeAccountNumber($data[3]);
            $educator = $this->educator->getEntities(['name' => $name, 'accountNumber' => $accountNumber]);
            if (!$educator) {
                $failedEducatorsTrx[] = $data;
//                continue;
            }
            // we only need failed list now, so skip everything else
//            continue;
        }
        $error = '';
        if (empty($failedEducatorsTrx)) {
            foreach ($excel->getSheet($excel->getFirstSheetIndex())->toArray() as $key => $data) {
                if ($key === 0) {
                    continue;
                }
                if (!$data[3]) {
                    break;
                }
                $name = Transliterator::toLatin($data[1]);
                $accountNumber = $this->normalizeAccountNumber($data[3]);
                $educator = $this->educator->getEntities(['name' => $name, 'accountNumber' => $accountNumber]);
                $donor = $this->donor->getEntities(['email' => trim($data[0])]);
                if (!$donor) {
                    // if not existing, it is failed transaction most probably, assign it to shared donor
                    $donor = $this->donor->getEntities(['email' => 'unknown@example.com']);
                }
                $trx = $this->service->getEntities(['name' => $name, 'amount' => $data[2], 'email' => $data[0]]);
                if (count($trx)) {
                    continue;
                }
                $dt = new \DateTime($data[4]);
                $trxData = [
                    'amount' => $data[2],
                    'name' => $name,
                    'status' => \Solidarity\Transaction\Entity\TransactionImport::STATUS_NEW,
                    'email' => $data[0],
                    'accountNumber' => $accountNumber,
                    'educator' => $educator[0]->id,
                    'donor' => $donor[0]->id,
                    'comment' => '',
                    'round' => 1,
                    'createdAt' => $dt,
                ];

                try {
                    $this->service->create($trxData);
                } catch (\Exception $e) {
                    $error .= " " . $e->getMessage() . " | ";
                }
            }
            if (strlen($error) > 0) {
                $this->getFlash()->error($error);
            } else {
                $this->getFlash()->success('File is valid and was imported.');
            }

            return $this->redirect('/transactionImport/importForm');
        }

        $spreadsheet = new Spreadsheet();
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->getSpreadsheet()->getProperties()
            ->setCreator("MS")
            ->setLastModifiedBy("MS");
        $writer->getSpreadsheet()->getDefaultStyle()->getAlignment()->setWrapText(true);
        $sheet = $writer->getSpreadsheet()->getActiveSheet();

        $sheet->getCell('A1')->setValue('email');
        $sheet->getCell('B1')->setValue('name');
        $sheet->getCell('C1')->setValue('amount');
        $sheet->getCell('D1')->setValue('accountNumber');
        foreach (['A', 'B', 'C', 'D'] as $letter) {
            $sheet->getColumnDimension($letter)->setAutoSize(true);
        }
        foreach ($failedEducatorsTrx as $row => $item) {
            $row++;
            $sheet->getCell('A' . $row)->setValue($item[0]);
            $sheet->getCell('B' . $row)->setValue($item[1]);
            $sheet->getCell('C' . $row)->setValue($item[2]);
            $sheet->getCell('D' . $row)->setValue($item[3] . ' ');
        }
        $filePath = DATA_PATH . '/invalid-accNumber-' . basename($sourceFile);
        $writer->save($filePath);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.basename($filePath).'"');
        header("Content-Transfer-Encoding: Binary");
        header('Cache-Control: max-age=0');
        $this->getResponse()->getBody()->write(file_get_contents($filePath));
        $this->getResponse()->getBody()->rewind();

        return $this->getResponse();
    }

    private function normalizeAccountNumber(string $accountNumber) : string
    {
        $numbersOnly = preg_replace('/[^0-9]/', '', $accountNumber);

        if (strlen($numbersOnly) === 18) {
            return $numbersOnly;
        }

        $parts = [
            substr($numbersOnly, 0, 3),
            substr($numbersOnly, 3, -2),
            substr($numbersOnly, -2),
        ];

        if (strlen($parts[1]) < 13) {
            $parts[1] = str_pad(
                $parts[1],
                13,
                '0',
                STR_PAD_LEFT
            );
        }

        return join('', $parts);
    }
}