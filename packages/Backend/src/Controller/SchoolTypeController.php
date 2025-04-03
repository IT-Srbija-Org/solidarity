<?php
namespace Solidarity\Backend\Controller;

use Skeletor\Core\Controller\AjaxCrudController;
use GuzzleHttp\Psr7\Response;
use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Solidarity\School\Service\SchoolType;
use Tamtamchik\SimpleFlash\Flash;

class SchoolTypeController extends AjaxCrudController
{
    const TITLE_VIEW = "View types";
    const TITLE_CREATE = "Create new type";
    const TITLE_UPDATE = "Edit type: ";
    const TITLE_UPDATE_SUCCESS = "type updated successfully.";
    const TITLE_CREATE_SUCCESS = "type created successfully.";
    const TITLE_DELETE_SUCCESS = "type deleted successfully.";
    const PATH = 'SchoolType';

    /**
     * @param SchoolType $service
     * @param Session $session
     * @param Config $config
     * @param Flash $flash
     * @param Engine $template
     */
    public function __construct(
        SchoolType $service, Session $session, Config $config, Flash $flash, Engine $template
    ) {
        parent::__construct($service, $session, $config, $flash, $template);
    }

}