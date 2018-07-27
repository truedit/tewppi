<?php

use Swagger\Client\Configuration;

class TruEdit_Configuration extends Configuration {

	public function __construct() {

		if ( TruEdit_Option::get( 'host' ) ) {
			$this->setHost( 'https://' . TruEdit_Option::get( 'host' ) . '/api' );
		}

		if ( TruEdit_Option::get( 'api_key' ) ) {
			$this->setApiKey( 'x_api_key', TruEdit_Option::get( 'api_key' ) );
		}

		if ( TruEdit_Option::get( 'app_api_key' ) ) {
			$this->setApiKey( 'x_app_api_key', TruEdit_Option::get( 'app_api_key' ) );
			// if ($key === 'app_api_key') return fgets(fopen(realpath(dirname(__DIR__) . '/../x_app_api_key.txt'), 'r'));
		}

	}

	public function getHost() {

		return $this->host;

	}
}

