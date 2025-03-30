<?php
namespace Solidarity\Backend\Controller;

use Solidarity\Delegate\Service\Delegate;
use Skeletor\Core\Controller\AjaxCrudController;
use GuzzleHttp\Psr7\Response;
use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
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
        Delegate $service, Session $session, Config $config, Flash $flash, Engine $template
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

    public function import()
    {
        ini_set('max_input_time', 600);
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $excel = $reader->load(APP_PATH . '/delegati-sredjeno.xlsx');

        $cleanList = [];
        foreach ($excel->getSheet($excel->getFirstSheetIndex())->toArray() as $key => $trxInfo) {
            if ($key === 0) {
                continue;
            }
            $status = 1;
            switch ($trxInfo[0]) {
                case 'Novo':
                    $status = 1;
                    break;
                case 'Problematično':
                    $status = 3;
                    break;
                case 'Verified':
                    $status = 2;
                    break;
            }

            $dt = new \DateTime($trxInfo[2]);

            //timestamp 3
            $delegateData = [
                'phone' => '',
                'email' => $trxInfo[3],
                'name' => $trxInfo[4],
                'schoolType' => $trxInfo[5],
                'schoolName' => $trxInfo[6],
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
            var_dump($trxInfo[2]);
            $this->service->create($delegateData);
        }
        die('done');
    }
}