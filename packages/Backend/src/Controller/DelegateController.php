<?php
namespace Solidarity\Backend\Controller;

use Skeletor\User\Entity\User;
use Solidarity\Delegate\Service\Delegate;
use Skeletor\Core\Controller\AjaxCrudController;
use GuzzleHttp\Psr7\Response;
use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Solidarity\Mailer\Service\Mailer;
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
        Delegate $service, Session $session, Config $config, Flash $flash, Engine $template, private Mailer $mailer
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

    /**
     * Sends round start info mail to ALL VERIFIED delegates. Does not know if any mails have been sent already.
     *
     * @return \Psr\Http\Message\ResponseInterface|void
     */
    public function sendRoundStartMailToDelegates()
    {
        ini_set('max_input_time', 600);
        ini_set('display_errors', '1');
        error_reporting(E_ALL);
        $verifiedDelegates = $this->service->getEntities(['status' => \Solidarity\Delegate\Entity\Delegate::STATUS_VERIFIED]);
        /* @var \Solidarity\Delegate\Entity\Delegate $delegate */
        foreach ($verifiedDelegates as $delegate) {
            $this->mailer->sendRoundStartMailToDelegate($delegate->email);
        }
        return $this->redirect('/delegate/view/');
    }

    public function import()
    {
        ini_set('max_input_time', 600);
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $excel = $reader->load(APP_PATH . '/delegati.xlsx');

        foreach ($excel->getSheet($excel->getFirstSheetIndex())->toArray() as $key => $trxInfo) {
            if ($key === 0) {
                continue;
            }
            if ($trxInfo[3] === null || !strlen($trxInfo[3])) {
                continue;
            }

            $status = 1;
            switch ($trxInfo[0]) {
                case 'Verifikovano':
                    $status = 2;
                    break;
                case 'Novo':
//                    $status = 1;
//                    break;
                case 'Problematično':
//                    $status = 3;
//                    break;
                case 'Duplikat':
                    continue(2);
            }
            $unixTimestamp = ($trxInfo[2] - 25569) * 86400;
            $dateTime = gmdate("Y-m-d H:i:s", $unixTimestamp);
            $dt = new \DateTime($dateTime);

            $delegateData = [
                'phone' => '',
                'email' => $trxInfo[3],
                'name' => $trxInfo[4],
                'schoolType' => $trxInfo[5],
                'schoolName' => str_replace(['"', "'"], '', $trxInfo[6]),
                'city' => $trxInfo[7],
                'count' => $trxInfo[8],
                'countBlocking' => $trxInfo[9],
                'comment' => $trxInfo[10],
                'verifiedBy' => $trxInfo[12],
                'formLinkSent' => ($trxInfo[1] === "FALSE") ? 0:1,
                'status' => $status,
                'createdAt' => $dt,
                'updatedAt' => $dt,
            ];
//            var_dump($trxInfo[3]);
            try {
                $this->service->create($delegateData);
            } catch (\Exception $e) {
                var_dump($this->service->parseErrors());
                die();
            }

        }
        die('done');
    }
}