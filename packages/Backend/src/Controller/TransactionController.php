<?php
namespace Solidarity\Backend\Controller;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Solidarity\Delegate\Service\Delegate;
use Solidarity\Donor\Service\Donor;
use Solidarity\Educator\Service\Educator;
use Solidarity\Mailer\Service\Mailer;
use Solidarity\Transaction\Service\Round;
use Solidarity\Transaction\Service\Transaction;
use Skeletor\Core\Controller\AjaxCrudController;
use GuzzleHttp\Psr7\Response;
use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Tamtamchik\SimpleFlash\Flash;
use Turanjanin\SerbianTransliterator\Transliterator;

class TransactionController extends AjaxCrudController
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
     * @param Transaction $service
     * @param Session $session
     * @param Config $config
     * @param Flash $flash
     * @param Engine $template
     */
    public function __construct(
        Transaction $service, Session $session, Config $config, Flash $flash, Engine $template,
        private Donor $donor, private Educator $educator, private Transaction $transaction, private Round $round,
        private Mailer $mailer, private \Solidarity\Educator\Filter\Educator $educatorFilter, private Delegate $delegate
    ) {
        parent::__construct($service, $session, $config, $flash, $template);
        $this->tableViewConfig['createButton'] = false;
    }

    public function sendTransactionListToAffectedDelegates()
    {
        foreach ($this->delegate->getAffectedDelegates() as $delegateData) {
            var_dump($delegateData['email']);
            $fileName = $this->service->compileXlsxTransactionList(
                $this->service->getTransactionsBySchool($delegateData['schoolId']), $delegateData['schoolName']
            );
            $this->mailer->sendTransactionListToDelegate($delegateData['email'], $fileName);
        }
        die('done');
    }

    public function mapPayments()
    {
        die();
        $round = $this->round->getActiveRound();
        $donorsList = $this->donor->getForMapping();
        $receiversList = $this->educator->getForMapping();

//        var_dump($donorsList);
//        var_dump($receiversList);
//        die();

        $donorCount = array_fill(0, count($donorsList), 0);
        foreach ($receiversList as $receiver) {
            $remainingAmount = $receiver["amount"];
            $i = 0;
            // @TODO test case when same donor donates 2x max donation limit. one donor can donate no more than 30k to single receiver
            // @TODO add limit per transaction
            while ($remainingAmount > 0 && $i < count($donorsList)) {
                if ($donorCount[$i] < static::MAX_DONATIONS && $donorsList[$i]["amountLeft"] > 0) {
                    if ($this->transaction->perPersonLimit($donorsList[$i]["email"], $receiver['name'])) {
                        continue;
                    }

                    $donation = min($donorsList[$i]["amountLeft"], $remainingAmount);
                    // ensure max donation amount per transaction
                    $donation = min($donation, static::MAX_DONATION_AMOUNT);
                    $donorsList[$i]["amountLeft"] -= $donation;
                    $remainingAmount -= $donation;
                    $donorCount[$i]++;
//                    var_dump([
//                        "name" => $receiver["name"],
//                        "accountNumber" => $receiver["accountNumber"],
//                        "amount" => $donation,
//                        "email" => $donorsList[$i]['email'],
//                        'comment' => '',
//                        'status' => 1,
//                    ]);
                    $this->transaction->create([
                        "name" => $receiver["name"],
                        "accountNumber" => $receiver["accountNumber"],
                        "amount" => $donation,
                        "email" => $donorsList[$i]['email'],
                        'comment' => '',
                        'status' => 1,
                        'archived' => 0,
                        'round' => $round->id,
                    ]);
                }
                $i++;
            }
            // receiver nulled, set status to sent
            $this->educator->updateField('status', \Solidarity\Educator\Entity\Educator::STATUS_SENT, $receiver['id']);
        }

        die('done');
    }

    public function startNewRound()
    {
        $this->educator->startNewRound();
        $this->transaction->startNewRound();
        $dt = new \DateTime();
        $this->round->create(['name' => 'runda pocela: ' . $dt->format('d/m')]);

        die('round prepared');
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

    public function import()
    {
        ini_set('max_execution_time', 3600);
        ini_set('memory_limit', '512M');
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
//        $excel = $reader->load(APP_PATH . '/lista-svih-uplata-runda1-15.xlsx');
        $excel = $reader->load(APP_PATH . '/failed-educators-trx.xlsx');
        $failedData = [];
        $failedDonorsTrx = [];
        $failedEducatorsTrx = [];
        foreach ($excel->getSheet($excel->getFirstSheetIndex())->toArray() as $key => $data) {
            if ($key === 0) {
                continue;
            }
            if (!$data[1]) {
                break;
            }
            $name = Transliterator::toLatin($data[1]);
            $accountNumber = $this->normalizeAccountNumber($data[3]);
//            $educator = $this->educator->getEntities(['name' => $name, 'accountNumber' => $accountNumber]);
            $educator = $this->educator->getEntities(['name' => $name]);
            if (!$educator) {
//                var_dump($data);
                $failedEducatorsTrx[] = $data;
                continue;
            }
            $donor = $this->donor->getEntities(['email' => trim($data[0])]);
            if (!$donor) {
                $failedDonorsTrx[] = $data;
                continue;
            }
            $trx = $this->service->getEntities(['name' => $name, 'amount' => $data[2], 'email' => $data[0]]);
            if (count($trx)) {
                continue;
            }
            $trxData = [
                'amount' => $data[2],
                'name' => $name,
                'status' => \Solidarity\Transaction\Entity\Transaction::STATUS_NEW,
                'email' => $data[0],
                'accountNumber' => $accountNumber,
                'educator' => $educator[0]->id,
                'donor' => $donor[0]->id,
                'comment' => '',
                'round' => 1,
            ];

            try {
                $this->service->create($trxData);
            } catch (\Exception $e) {
                var_dump($data);
                var_dump($e->getMessage());
                var_dump($this->service->parseErrors());
                $failedData[] = $data;
            }
        }

        // failed trx cause donors
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
        foreach ($failedDonorsTrx as $row => $item) {
            $sheet->getCell('A' . $row)->setValue($item[0]);
            $sheet->getCell('B' . $row)->setValue($item[1]);
            $sheet->getCell('C' . $row)->setValue($item[2]);
            $sheet->getCell('D' . $row)->setValue($item[3] . ' ');
        }
        $filePath = APP_PATH . '/failed-donors-edu-trx.xlsx';
        $writer->save($filePath);

        // failed trx cause educators
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
            $sheet->getCell('A' . $row)->setValue($item[0]);
            $sheet->getCell('B' . $row)->setValue($item[1]);
            $sheet->getCell('C' . $row)->setValue($item[2]);
            $sheet->getCell('D' . $row)->setValue($item[3] . ' ');
        }
        $filePath = APP_PATH . '/failed-educators-edu-trx.xlsx';
        $writer->save($filePath);

        var_dump($failedData);
        die();
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