<?php
namespace Solidarity\Frontend\Action;

use Laminas\Config\Config;
use Laminas\Session\ManagerInterface as Session;
use League\Plates\Engine;
use Psr\Log\LoggerInterface as Logger;
use Skeletor\Core\Action\Web\Html;
use Tamtamchik\SimpleFlash\Flash;

class BaseAction extends Html
{

    /**
     * HomeAction constructor.
     * @param Logger $logger
     * @param Config $config
     * @param Engine $template
     * @param Session $session
     */
    public function __construct(
        Logger $logger, Config $config, Engine $template
    ) {
        parent::__construct($logger, $config, $template);
	    $this->setGlobalVariable( 'url', $this->getConfig()->offsetGet( 'baseUrl' ) );

        if (Flash::hasMessages('error')) { // print only errors
            $this->setGlobalVariable('messages', Flash::display());
        }
    }

    public function return404()
    {
        return $this->respond('/index/404');
    }
}