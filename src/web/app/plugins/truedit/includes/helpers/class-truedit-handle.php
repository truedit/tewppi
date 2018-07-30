<?php

class TruEdit_Handle {

	private static $version;
	private static $plugin_name;

	public function __construct( $plugin_name, $version ) {

		self::$plugin_name = $plugin_name;
		self::$version     = $version;

	}

	public static function swagger_exception( $e, $action = '' ) {

		$code     = $e->getCode();
		$message  = '';
		$warnings = [];

		$body = json_decode( $e->getResponseBody() );

		if ( 404 === $code ) {
			$message = 'There was no response from the host. Please check that the host url is correct.';
		} elseif ( 401 === $code ) {
			$message = 'The API Key or Application Key set is incorrect.';
		} else {
			$code    = 400;
			$message = 'There was no response from the host. Please check that the host url is correct.';
		}

		// StatusCode 4000 seems be what is used when there is a duplicate Automation
		// TODO: Refactor this into something more universal. The API gives us plenty of info, we should use it
		if ( null !== $body && 4000 === $body->statusCode && 400 === $code ) {
			$message = $body->errorMessage;
		}

		TruEdit_Log::error( $message );

		return new WP_Error(
			'TR_ERROR', $message, [
				'status'   => $code,
				'warnings' => $warnings,
			]
		);

	}

	public static function truedit_exception( $e, $action = '' ) {

		$code     = 400;
		$message  = $e->getMessage();
		$warnings = [];

		TruEdit_Log::error( $message );

		return new WP_Error(
			'WP_ERROR', $message, [
				'status'   => $code,
				'warnings' => $warnings,
			]
		);

	}

	public static function exception( $e, $action = '' ) {

		$code     = 400;
		$message  = $e->getMessage();
		$warnings = [];

		TruEdit_Log::error( ( ! empty( $action ) ? ucwords( $action ) . ' : ' : '' ) . $message );

		return new WP_Error(
			'ERROR', $message, [
				'status'   => $code,
				'warnings' => $warnings,
			]
		);

	}


}

