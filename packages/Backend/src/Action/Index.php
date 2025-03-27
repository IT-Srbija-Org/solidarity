<?php

namespace Solidarity\Backend\Action;

use Psr\Log\LoggerInterface as Logger;
use Laminas\Config\Config;
use \League\Plates\Engine;
use Skeletor\Core\Action\Web\Html;
use Laminas\Session\ManagerInterface as Session;
use Skeletor\Core\Mapper\NotFoundException;
use Tamtamchik\SimpleFlash\Flash;

class Index extends Html
{
    /**
     * @var Session
     */
    private $session;
    /**
     * @var Flash
     */
    private $flash;

    /**
     * HomeAction constructor.
     * @param Logger $logger
     * @param Config $config
     * @param Engine $template
     */
    public function __construct(
        Logger $logger, Config $config, Engine $template, Session $session, Flash $flash
    ) {
        parent::__construct($logger, $config, $template);
        $this->flash = $flash;
        $this->session = $session;
        $this->setGlobalVariable('loggedIn', $this->session->getStorage()->offsetGet('loggedIn'));
    }

    /**
     * Parses data for provided merchantId
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request request
     * @param \Psr\Http\Message\ResponseInterface $response response
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    public function __invoke(
        \Psr\Http\Message\ServerRequestInterface $request,
        \Psr\Http\Message\ResponseInterface $response
    ) {
        $url = $this->getConfig()->offsetGet('baseUrl') . '/login/loginForm/';

        return $response->withStatus(302)->withHeader('Location', $url);
    }

}