<?php
namespace Solidarity\Frontend\Action;

use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Solidarity\Frontend\Action\BaseAction;
use Psr\Log\LoggerInterface as Logger;

class Delegate extends BaseAction
{
    public function __construct(
        Logger $logger, Config $config, Engine $template, private \Solidarity\Delegate\Service\Delegate $delegate
    ) {
        parent::__construct($logger, $config, $template);
    }

    public function __invoke(
        \Psr\Http\Message\ServerRequestInterface $request,
        \Psr\Http\Message\ResponseInterface $response
    ) {
	    $delegateRepo = $this->delegate->getRepository();

	    $schoolTypes = ! empty( $delegateRepo->getAllSchoolTypes() ) ? $delegateRepo->getAllSchoolTypes() : $this->getConfig()->offsetGet( 'schoolTypes' )->toArray();
	    $schoolsMap  = ! empty( $delegateRepo->getAllSchools() ) ? $delegateRepo->getAllSchools() : $this->getConfig()->offsetGet( 'schoolsMap' )->toArray();

	    $this->setGlobalVariable( 'schoolTypes', $schoolTypes );
	    $this->setGlobalVariable( 'schoolsMap', $schoolsMap );
        $this->setGlobalVariable('title', 'Forma za delegate');

        $data = $request->getParsedBody();

        if (!empty($data)) {
            try {
                $this->delegate->create($data);
                // @TODO send mail
                return $this->redirect('/hvalaDelegatu');
            } catch (\Exception $e) {
                // handle
	            $errors = $this->delegate->parseErrors();

	            return $this->respond('delegate/signup',
                    ['errors' => $errors, 'data' => $data]);
            }
        }

        return $this->respond('delegate/signup', []);
    }
}