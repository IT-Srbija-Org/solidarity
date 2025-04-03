<?php
namespace Solidarity\Backend\Controller;

use Skeletor\Core\Controller\AjaxCrudController;
use GuzzleHttp\Psr7\Response;
use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Solidarity\School\Service\City;
use Tamtamchik\SimpleFlash\Flash;

class CityController extends AjaxCrudController
{
    const TITLE_VIEW = "View city";
    const TITLE_CREATE = "Create new city";
    const TITLE_UPDATE = "Edit city: ";
    const TITLE_UPDATE_SUCCESS = "City updated successfully.";
    const TITLE_CREATE_SUCCESS = "City created successfully.";
    const TITLE_DELETE_SUCCESS = "City deleted successfully.";
    const PATH = 'City';

    /**
     * @param City $service
     * @param Session $session
     * @param Config $config
     * @param Flash $flash
     * @param Engine $template
     */
    public function __construct(
        City $service, Session $session, Config $config, Flash $flash, Engine $template
    ) {
        parent::__construct($service, $session, $config, $flash, $template);
    }

}