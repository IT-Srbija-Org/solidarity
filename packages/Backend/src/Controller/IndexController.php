<?php
namespace Fakture\Backend\Controller;

use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use Tamtamchik\SimpleFlash\Flash;
use Twig\Environment as Twig;

/**
 * Class IndexController
 * @package Fakture\Backend\Controller
 */
class IndexController extends \Skeletor\Controller\Controller
{
    public function __construct(
        Session $session, Config $config, Flash $flash, Twig $twig
    ) {
        parent::__construct($twig, $config, $session, $flash);
    }

    public function index()
    {
        return $this->redirect('admin/login/login');
    }
}
