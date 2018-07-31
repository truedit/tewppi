<?php

use GuzzleHttp\Client;

class TruEdit_Resource_Check {

	private $x_api_key;
	private $x_app_api_key;

	public function __construct() {

		$configuration = new TruEdit_Configuration();
			$configuration->setHost( TruEdit_Option::get( 'host' ) . '/api' );
			$configuration->setApiKey( 'x_api_key', TruEdit_Option::get( 'api_key' ) );
			$configuration->setApiKey( 'x_app_api_key', TruEdit_Option::get( 'app_api_key' ) );

		$this->api = new Swagger\Client\Api\UserApi(
			new Client(),
			$configuration
		);

		$this->x_api_key     = $configuration->getApiKey( 'x_api_key' );
		$this->x_app_api_key = $configuration->getApiKey( 'x_app_api_key' );

	}

	public function check() {

		$accept_language = 'application/json'; // string |

		try {
			return $this->api->getSessionInfoUsingGET( $this->x_api_key, $this->x_app_api_key, $accept_language );
		} catch ( Exception $e ) {
			throw $e;
		}

	}

}
