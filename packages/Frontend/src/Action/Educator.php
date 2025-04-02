<?php
namespace Solidarity\Frontend\Action;

use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Skeletor\Core\Validator\ValidatorException;
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
        $this->setGlobalVariable('title', 'Forma za edukatore');
        $data = $request->getParsedBody();
        if (!empty($data)) {
            try {
                $this->educator->create($data);
                // @TODO send mail
                return $this->redirect('/hvalaZaOstecenog');
            } catch (ValidatorException $e) {
                $errors = [];
                foreach ($this->educator->parseErrors() as $key => $error) {
                    unset($data[$key]);
                    $errors[] = $error['message'];
                }
                return $this->respond('educator/signup', ['errors' => $errors, 'data' => $data]);
            }
        }

        return $this->respond('educator/signup', ['data' => []]);
    }
}