<?php
namespace Solidarity\Backend\Controller;

use Solidarity\Educator\Service\Educator;
use Skeletor\Core\Controller\AjaxCrudController;
use GuzzleHttp\Psr7\Response;
use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Tamtamchik\SimpleFlash\Flash;

class EducatorController extends AjaxCrudController
{
    const TITLE_VIEW = "View educators";
    const TITLE_CREATE = "Create new educator";
    const TITLE_UPDATE = "Edit educator: ";
    const TITLE_UPDATE_SUCCESS = "Educator updated successfully.";
    const TITLE_CREATE_SUCCESS = "Educator created successfully.";
    const TITLE_DELETE_SUCCESS = "Educator deleted successfully.";
    const PATH = 'educator';

    /**
     * @param Educator $service
     * @param Session $session
     * @param Config $config
     * @param Flash $flash
     * @param Engine $template
     */
    public function __construct(
        Educator $service, Session $session, Config $config, Flash $flash, Engine $template
    ) {
        parent::__construct($service, $session, $config, $flash, $template);
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
        $excel = $reader->load(APP_PATH . '/osteceni.xlsx');

        foreach ($excel->getSheet($excel->getFirstSheetIndex())->toArray() as $key => $trxInfo) {
            if ($key === 0) {
                continue;
            }
            $status = 1;
            switch ($trxInfo[9]) {
                case 'Poslato':
                    $status = 1;
                    break;
                case 'Nije poslato':
                    $status = 3;
                    break;
                case 'Za slanje':
                    $status = 2;
                    break;
            }

            $data = [
                'amount' => $trxInfo[4],
                'name' => $trxInfo[2],
                'schoolName' => $trxInfo[1],
                'slipLink' => $trxInfo[6],
                'accountNumber' => $trxInfo[3],
                'city' => $trxInfo[5],
                'status' => $status,
                'comment' => ''
            ];
            var_dump($trxInfo[3]);
            try {
                $this->service->create($data);
            } catch (\Exception $e) {
                var_dump($e->getMessage());
            }

        }
        die('done');
    }
}