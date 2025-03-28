<?php
namespace Solidarity\Frontend\Action;

use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Solidarity\Frontend\Action\BaseAction;
use Psr\Log\LoggerInterface as Logger;

class Educator extends BaseAction
{
    public function __construct(
        Logger $logger, Config $config, Engine $template, private \Solidarity\Educator\Service\Educator $educator
    ) {
        parent::__construct($logger, $config, $template);

    }

    public function __invoke(
        \Psr\Http\Message\ServerRequestInterface $request,
        \Psr\Http\Message\ResponseInterface $response
    ) {
        $this->setGlobalVariable('title', 'Forma za delegate');
//        if($this->visitorSession->getLoggedInUserId()) {
//            return $response->withStatus(302)->withHeader('Location', '/profil/');
//        }
        $data = $request->getParsedBody();
        if (!empty($data)) {
            try {
                $this->educator->create($data);
                // @TODO send mail
                $this->redirect('donorThankyou');
            } catch (\Exception $e) {
                // handle
            }

        }

        return $this->respond('educator/signup', []);
    }
}