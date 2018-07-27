<?php

use GuzzleHttp\Client;

class TruEdit_Client extends Client implements GuzzleHttp\ClientInterface {

	public function __construct( array $config = [] ) {

		parent::__construct( $config );

		if ( ! TruEdit_Has::apiKey() ) {
			throw new TruEdit_Exception( 'NO_API_KEY' );
		}

		if ( ! TruEdit_Has::appApiKey() ) {
			throw new TruEdit_Exception( 'NO_APP_API_KEY' );
		}

		if ( ! TruEdit_Has::verified() ) {
			throw new TruEdit_Exception( 'SERVER_SETTINGS_NOT_TESTED' );
		}

		if ( ! TruEdit_Has::https() ) {
			throw new TruEdit_Exception( 'NO_HTTPS' );
		}

		if ( ! TruEdit_Has::writableFolder() ) {
			throw new TruEdit_Exception( 'INCORRECT_WRITE_PERMISSIONS' );
		}

		if ( ! TruEdit_Has::zipArchive() ) {
			throw new TruEdit_Exception( 'NO_ZIP_ARCHIVE' );
		}

		if ( ! TruEdit_Has::json() ) {
			throw new TruEdit_Exception( 'NO_JSON' );
		}

		if ( ! TruEdit_Has::correctPhpVersion() ) {
			throw new TruEdit_Exception( 'INCORRECT_PHP_VERSION' );
		}

		if ( ! TruEdit_Has::correctWpVersion() ) {
			throw new TruEdit_Exception( 'INCORRECT_WP_VERSION' );
		}

	}

}
