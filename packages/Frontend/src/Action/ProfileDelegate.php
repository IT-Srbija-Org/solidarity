<?php
namespace Solidarity\Frontend\Action;

use Laminas\Config\Config;
use Laminas\Session\SessionManager as Session;
use League\Plates\Engine;
use Solidarity\Frontend\Action\BaseAction;
use Psr\Log\LoggerInterface as Logger;

class ProfileDelegate extends BaseAction {
	public function __construct(
		Logger $logger, Config $config, Engine $template, private \Solidarity\Delegate\Service\Delegate $delegate
	) {
		parent::__construct( $logger, $config, $template );
	}

	public function __invoke(
		\Psr\Http\Message\ServerRequestInterface $request,
		\Psr\Http\Message\ResponseInterface $response
	) {
		$this->setGlobalVariable( 'title', 'Profile za delegata' );
		$data = $request->getParsedBody();
		$user = $this->delegate->getById( 1 );

		if ( ! empty( $data ) ) {
			try {
				$data['id'] = 1;

				$this->delegate->update( $data );

				return $this->respond( 'delegate/profile', [ 'user' => $user ] );
			} catch ( \Exception $e ) {
				// handle
				$errors = $this->delegate->parseErrors();

				return $this->respond( 'delegate/profile',
					[ 'errors' => $errors, 'data' => $data ] );
			}
		}

		return $this->respond( 'delegate/profile', [ 'user' => $user ] );
	}
}
