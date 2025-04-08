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
		// TODO - create login functionality for delegate and use corresponding delegate ID to get data
		$is_development = 'development' === getenv( 'APPLICATION_ENV' );
		$delegateRepo   = $this->delegate->getRepository();

		$schoolTypes = ! empty( $delegateRepo->getAllSchoolTypes() ) ? $delegateRepo->getAllSchoolTypes() : $this->getConfig()->offsetGet( 'schoolTypes' )->toArray();
		$schoolsMap  = ! empty( $delegateRepo->getAllSchools() ) ? $delegateRepo->getAllSchools() : $this->getConfig()->offsetGet( 'schoolsMap' )->toArray();

		$this->setGlobalVariable( 'schoolTypes', $schoolTypes );
		$this->setGlobalVariable( 'schoolsMap', $schoolsMap );
		$this->setGlobalVariable( 'title', 'Profile za delegata' );

		$data         = $request->getParsedBody();
		$default_data = array();

		if ( $is_development ) {
			$default_data = $this->delegate->getById( 1 );
		}

		if ( ! empty( $data ) ) {
			try {

				if ( $is_development ) {
					$data['id'] = 1;

					$this->delegate->update( $data );
				}

				return $this->respond( 'delegate/profile', [ 'user' => $data ] );
			} catch ( \Exception $e ) {
				// handle
				$errors = $this->delegate->parseErrors();

				return $this->respond( 'delegate/profile',
					[ 'errors' => $errors, 'user' => $data ] );
			}
		}

		return $this->respond( 'delegate/profile', [ 'user' => $default_data ] );
	}
}
