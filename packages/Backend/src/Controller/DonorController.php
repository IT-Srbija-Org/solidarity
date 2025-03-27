<?php
namespace Solidarity\Backend\Controller;

use Solidarity\Donor\Service\Donor;
use Skeletor\Core\Controller\AjaxCrudController;
use GuzzleHttp\Psr7\Response;
use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Tamtamchik\SimpleFlash\Flash;

class DonorController extends AjaxCrudController
{
    const TITLE_VIEW = "View donors";
    const TITLE_CREATE = "Create new donor";
    const TITLE_UPDATE = "Edit donor: ";
    const TITLE_UPDATE_SUCCESS = "Donor updated successfully.";
    const TITLE_CREATE_SUCCESS = "Donor created successfully.";
    const TITLE_DELETE_SUCCESS = "Donor deleted successfully.";
    const PATH = 'donor';

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
    }

    public function form(): Response
    {

        return parent::form();
    }


    public function getEntityData()
    {
        $this->getResponse()->getBody()->write(json_encode($this->service->getEntityData(
            (int) $this->getRequest()->getAttribute('id'), $this->getRequest()->getQueryParams()['currency']
        )));
        $this->getResponse()->getBody()->rewind();

        return $this->getResponse()->withHeader('Content-Type', 'application/json');
    }
}