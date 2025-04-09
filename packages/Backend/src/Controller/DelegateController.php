<?php
namespace Solidarity\Backend\Controller;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Skeletor\User\Entity\User;
use Solidarity\Delegate\Service\Delegate;
use Skeletor\Core\Controller\AjaxCrudController;
use GuzzleHttp\Psr7\Response;
use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Solidarity\Mailer\Service\Mailer;
use Solidarity\School\Service\School;
use Tamtamchik\SimpleFlash\Flash;

class DelegateController extends AjaxCrudController
{
    const TITLE_VIEW = "View delegate";
    const TITLE_CREATE = "Create new delegate";
    const TITLE_UPDATE = "Edit delegate: ";
    const TITLE_UPDATE_SUCCESS = "Delegate updated successfully.";
    const TITLE_CREATE_SUCCESS = "Delegate created successfully.";
    const TITLE_DELETE_SUCCESS = "Delegate deleted successfully.";
    const PATH = 'Delegate';

    /**
     * @param Delegate $service
     * @param Session $session
     * @param Config $config
     * @param Flash $flash
     * @param Engine $template
     */
    public function __construct(
        Delegate $service, Session $session, Config $config, Flash $flash, Engine $template, private Mailer $mailer,
        private School $school
    ) {
        parent::__construct($service, $session, $config, $flash, $template);
        if ($this->getSession()->getStorage()->offsetGet('loggedInRole') !== User::ROLE_ADMIN) {
            $this->tableViewConfig['createButton'] = false;
        }

    }

    public function form(): Response
    {

        return parent::form();
    }

//    public function create(): Response
//    {
//        die('disabled');
//    }

    /**
     * Sends round start info mail to ALL VERIFIED delegates. Does not know if any mails have been sent already.
     *
     * @return \Psr\Http\Message\ResponseInterface|void
     */
    public function sendRoundStartMailToDelegates()
    {
        ini_set('max_input_time', 600);
        $verifiedDelegates = $this->service->getEntities(['status' => \Solidarity\Delegate\Entity\Delegate::STATUS_VERIFIED]);
        /* @var \Solidarity\Delegate\Entity\Delegate $delegate */
        foreach ($verifiedDelegates as $delegate) {
            $this->mailer->sendRoundStartMailToDelegate($delegate->email);
        }
        return $this->redirect('/delegate/view/');
    }

    public function addSchoolRelation()
    {
        foreach ($this->service->getEntities() as $entity) {
            $school = $this->school->getByNameAndCity(trim($entity->schoolName), trim($entity->city));
            if (!$school) {
                var_dump($entity->schoolName);
                var_dump($entity->city);

                die('school not found');
                $failedData[] = $educatorData;
                continue;
            }
            $this->service->updateField('school', $school->id, $entity->id);
        }
        die('done');
    }

    public function import()
    {
        ini_set('max_input_time', 600);
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $excel = $reader->load(APP_PATH . '/delegati.xlsx');
//        $spreadsheet = new Spreadsheet();
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($excel);
//        $sheet = $writer->getSpreadsheet()->getActiveSheet();
        $spreadsheet = $writer->getSpreadsheet();
        foreach ($spreadsheet->getSheet($excel->getFirstSheetIndex())->toArray() as $key => $trxInfo) {
            if ($key === 1) {
                continue;
            }

            if ($trxInfo[4] === null || !strlen($trxInfo[4])) {
                continue;
            }

            $status = 1;
            switch (trim($trxInfo[0])) {
                case 'Verifikovano':
                    $status = 2;
                    break;
                case 'Novo':
                    $status = 1;
                    break;
                case 'Problematično':
//                    $status = 3;
//                    break;
                case 'Duplikat':
                    continue(2);
                default:
                    continue(2);
            }
            $unixTimestamp = ($trxInfo[3] - 25569) * 86400;
            $dateTime = @gmdate("Y-m-d H:i:s", $unixTimestamp);
            $dt = new \DateTime($dateTime);

            $schoolName = trim(str_replace(['"', "'"], '', $trxInfo[8]));
            $cityName = trim($trxInfo[9]);
            if ($schoolName === '' && $cityName === '') {
                continue;
            }

            $school = $this->school->getByNameAndCity($schoolName, $cityName);
            if (!$school) {
                var_dump($schoolName);
                var_dump($cityName);

                die('school not found');
                $failedData[] = $educatorData;
                continue;
            }

            $delegateData = [
                'phone' => '',
                'email' => $trxInfo[4],
                'name' => $trxInfo[6],
                'school' => $school->id,
                'schoolType' => $trxInfo[7] ?? '',
                'schoolName' => $schoolName,
                'city' => $cityName,
                'count' => $trxInfo[10],
                'countBlocking' => $trxInfo[11],
                'comment' => $trxInfo[12],
                'verifiedBy' => $trxInfo[14],
                'formLinkSent' => ($trxInfo[1] === "FALSE") ? 0:1,
                'status' => $status,
                'createdAt' => $dt,
                'updatedAt' => $dt,
            ];

            $delegate = $this->service->getEntities([
                'schoolName' => trim(str_replace(['"', "'"], '', $trxInfo[7])),
                'schoolType' => $trxInfo[6],
                'city' => trim($trxInfo[8]),
            ]);
            if (count($delegate)) {
                $spreadsheet->getSheet($excel->getFirstSheetIndex())->getCell('Q' . $key)->setValue('vec postoji u bazi');
                continue;
            }

//            var_dump($trxInfo[3]);
            try {
                $this->service->create($delegateData);
                $spreadsheet->getSheet($excel->getFirstSheetIndex())->getCell('Q' . $key)->setValue('kreiran');
            } catch (\Exception $e) {
                var_dump($this->service->parseErrors());
                $spreadsheet->getSheet($excel->getFirstSheetIndex())->getCell('Q' . $key)->setValue($this->service->parseErrors()[0]['message']);
            }
        }
        $filePath = APP_PATH . '/delegati.xlsx';
        $writer->save($filePath);
        die('done');
    }
}