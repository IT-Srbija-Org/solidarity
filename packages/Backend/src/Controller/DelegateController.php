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
    const PATH = 'delegate';

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