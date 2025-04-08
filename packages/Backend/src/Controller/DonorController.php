<?php
namespace Solidarity\Backend\Controller;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Solidarity\Donor\Service\Donor;
use Skeletor\Core\Controller\AjaxCrudController;
use GuzzleHttp\Psr7\Response;
use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Tamtamchik\SimpleFlash\Flash;
use Turanjanin\SerbianTransliterator\Transliterator;

class DonorController extends AjaxCrudController
{
    const TITLE_VIEW = "View donors";
    const TITLE_CREATE = "Create new donor";
    const TITLE_UPDATE = "Edit donor: ";
    const TITLE_UPDATE_SUCCESS = "Donor updated successfully.";
    const TITLE_CREATE_SUCCESS = "Donor created successfully.";
    const TITLE_DELETE_SUCCESS = "Donor deleted successfully.";
    const PATH = 'Donor';

    /**
     * @param Donor $service
     * @param Session $session
     * @param Config $config
     * @param Flash $flash
     * @param Engine $template
     */
    public function __construct(
        Donor $service, Session $session, Config $config, Flash $flash, Engine $template
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

    public function normalizeAmount($input) {
        // Remove any non-numeric characters except commas and periods
        $input = preg_replace('/[^0-9,.]/', '', $input);

        // Check if the input uses a comma as a decimal separator
        if (preg_match('/\d+,\d{2}$/', $input)) {
            $input = str_replace('.', '', $input); // Remove thousand separators
            $input = str_replace(',', '.', $input); // Convert comma decimal separator to period
        } else {
            $input = str_replace(',', '', $input); // Remove thousand separators
        }

        return intval($input);
    }

    public function import()
    {
        ini_set('max_execution_time', 0);
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $excel = $reader->load(APP_PATH . '/donatori.xlsx');
        $failedData = [];

        foreach ($excel->getSheet($excel->getFirstSheetIndex())->toArray() as $key => $data) {
//            if ($key === 0) {
//                continue;
//            }
            if (!$data[1]) {
                continue;
            }
            $amount = $this->normalizeAmount($data[2]);
//            if (!$amount || $amount < 200) {
//                $failedData[] = $data;
//                continue;
//            }
//            if (strlen($amount) < 3) {
//                $failedData[] = $data;
//                continue;
//            }
            $email = trim($data[1]);
            if (strlen($email) < 6) {
                $failedData[] = $data;
                continue;
            }
            $donor = $this->service->getEntities(['email' => $email]);
            if (count($donor)) {
                continue;
            }
//            var_dump($data);
//            die();
            $unixTimestamp = (intval($data[0]) - 25569) * 86400;
            $dateTime = @gmdate("Y-m-d H:i:s", $unixTimestamp);
            $dt = new \DateTime($dateTime);
            $monthly = (isset($data[3]) && $data[3]) ? $data[3] : '';

            $donorData = [
                'amount' => number_format($amount, 0, '', ''),
                'email' => $email,
                'createdAt' => $dt,
                'monthly' => (strtoupper($monthly) === "DA") ? 1:0,
                'comment' => ($data[4]) ?: '',
            ];

            try {
                $this->service->create($donorData);
            } catch (\Exception $e) {

                $errors = $this->service->parseErrors();
                if (empty($errors)) {
                    var_dump($e->getMessage());
                } else {
                    var_dump($this->service->parseErrors());
                }
//                var_dump($email);
                $failedData[] = $data;
            }
        }

        $spreadsheet = new Spreadsheet();
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->getSpreadsheet()->getProperties()
            ->setCreator("MS")
            ->setLastModifiedBy("MS");
        $writer->getSpreadsheet()->getDefaultStyle()->getAlignment()->setWrapText(true);
        $sheet = $writer->getSpreadsheet()->getActiveSheet();

        $sheet->getCell('A1')->setValue('amount');
        $sheet->getCell('B1')->setValue('email');
        $sheet->getCell('C1')->setValue('timestamp');
        $sheet->getCell('D1')->setValue('monthly');
        $sheet->getCell('E1')->setValue('comment');
        $sheet->getCell('F1')->setValue('comment');
        $sheet->getCell('G1')->setValue('comment');
        foreach (['A', 'B', 'C', 'D', 'E', 'F', 'G'] as $letter) {
            $sheet->getColumnDimension($letter)->setAutoSize(true);
        }
        foreach ($failedData as $row => $item) {
            $sheet->getCell('A' . $row)->setValue($item[0]);
            $sheet->getCell('B' . $row)->setValue($item[1]);
            $sheet->getCell('C' . $row)->setValue($item[2]);
            $sheet->getCell('D' . $row)->setValue($item[3]);
            $sheet->getCell('E' . $row)->setValue($item[4]);
            $sheet->getCell('F' . $row)->setValue($item[5]);
            $sheet->getCell('G' . $row)->setValue($item[6]);
        }
        $filePath = APP_PATH . '/failed-donors.xlsx';
        $writer->save($filePath);

//        var_dump($failedData);
//        die();
        die('done');
    }
}