<?php
namespace Solidarity\Backend\Controller;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Solidarity\Educator\Service\Educator;
use Skeletor\Core\Controller\AjaxCrudController;
use GuzzleHttp\Psr7\Response;
use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Solidarity\School\Service\School;
use Tamtamchik\SimpleFlash\Flash;

class EducatorController extends AjaxCrudController
{
    const TITLE_VIEW = "View educators";
    const TITLE_CREATE = "Create new educator";
    const TITLE_UPDATE = "Edit educator: ";
    const TITLE_UPDATE_SUCCESS = "Educator updated successfully.";
    const TITLE_CREATE_SUCCESS = "Educator created successfully.";
    const TITLE_DELETE_SUCCESS = "Educator deleted successfully.";
    const PATH = 'Educator';

    /**
     * @param Educator $service
     * @param Session $session
     * @param Config $config
     * @param Flash $flash
     * @param Engine $template
     */
    public function __construct(
        Educator $service, Session $session, Config $config, Flash $flash, Engine $template, private School $school,
        private \Redis $redis
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

    public function import()
    {
        ini_set('max_execution_time', 3600);
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $excel = $reader->load(APP_PATH . '/Osteceni.xlsx');
        $failedData = [];
//        $data = $this->redis->get('data');
        $data = false;
        if ($data === false) {
            $data = $excel->getSheet($excel->getFirstSheetIndex())->toArray();
//            $this->redis->set(serialize($data), 1200);
        } else {
            $data = unserialize($data);
        }

        foreach ($data as $key => $educatorData) {
            if ($key === 0) {
                continue;
            }

            $status = 1;
            switch ($educatorData[8]) {
                case 'Nije verifikovano':
                case 'Novo':
                    $status = \Solidarity\Educator\Entity\Educator::STATUS_NEW;
                    break;
                case 'Poslato':
                    $status = \Solidarity\Educator\Entity\Educator::STATUS_SENT;
                    break;
                case 'Primljeno':
                    $status = \Solidarity\Educator\Entity\Educator::STATUS_RECEIVED;
                    break;
                case 'Za slanje':
                    $status = \Solidarity\Educator\Entity\Educator::STATUS_FOR_SENDING;
                    break;
                case 'AFK duplikat':
                case 'Duplikat':
                    continue(2);
            }
            if (!$educatorData[1]) {
                continue;
            }
            $schoolName = trim(str_replace(['"', "'"], '', $educatorData[1]));
            $cityName = trim(str_replace(['"', "'"], '', $educatorData[5]));
            if ($schoolName === '' && $cityName === '') {
                break;
            }

            $school = $this->school->getByNameAndCity($schoolName, $cityName);
            if (!$school) {
                var_dump($schoolName);
                var_dump($cityName);

                die('school not found');
                $failedData[] = $educatorData;
                continue;
            }

            if (!$educatorData[4]) {
                continue;
            }

            $unixTimestamp = ($educatorData[0] - 25569) * 86400;
            $dateTime = gmdate("Y-m-d H:i:s", $unixTimestamp);
            $dt = new \DateTime($dateTime);
            $accNumber = str_replace([' ', '-'], '', $educatorData[3]);
            $accNumber = str_replace('O', '0', $accNumber);

            $data = [
                'amount' => $educatorData[4],
                'name' => $educatorData[2],
                'schoolName' => $schoolName,
                'slipLink' => ($educatorData[6] === '') ? '': $educatorData[6],
                'accountNumber' => $accNumber,
                'city' => $cityName,
                'status' => $status,
                'school' => $school->id,
                'createdAt' => $dt
            ];

            try {
                $this->service->create($data);
            } catch (\Exception $e) {
                var_dump($e->getMessage());
                var_dump($this->service->parseErrors());
                $failedData[] = $educatorData;
            }

        }

        $spreadsheet = new Spreadsheet();
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->getSpreadsheet()->getProperties()
            ->setCreator("MS")
            ->setLastModifiedBy("MS");
        $writer->getSpreadsheet()->getDefaultStyle()->getAlignment()->setWrapText(true);
        $sheet = $writer->getSpreadsheet()->getActiveSheet();

        $sheet->getCell('A1')->setValue('Timestamp');
        $sheet->getCell('B1')->setValue('skola');
        $sheet->getCell('C1')->setValue('ime');
        $sheet->getCell('D1')->setValue('rachun');
        $sheet->getCell('E1')->setValue('iznos');
        $sheet->getCell('F1')->setValue('grad');
        $sheet->getCell('G1')->setValue('Status');
        foreach (['A', 'B', 'C', 'D', 'E', 'F', 'G'] as $letter) {
            $sheet->getColumnDimension($letter)->setAutoSize(true);
        }
        foreach ($failedData as $row => $item) {
//            $sheet->getStyle('A' . $row)
//                ->getNumberFormat();
//                ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
                // wtflol !? https://github.com/PHPOffice/PhpSpreadsheet/issues/357
//                ->setFormatCode('#');
            $sheet->getCell('A' . $row)->setValue($item[0]);
            $sheet->getCell('B' . $row)->setValue($item[1]);
            $sheet->getCell('C' . $row)->setValue($item[2]);
            $sheet->getCell('D' . $row)->setValue($item[3] . ' ');
            $sheet->getCell('E' . $row)->setValue($item[4]);
            $sheet->getCell('F' . $row)->setValue($item[5]);
            $sheet->getCell('G' . $row)->setValue($item[8]);
        }
        $filePath = APP_PATH . '/failed-acc-no.xlsx';
        $writer->save($filePath);

        var_dump($failedData);
        die('done');
    }
}