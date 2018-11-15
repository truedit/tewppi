<?php

class TruEdit_Handle {

	private static $version;
	private static $plugin_name;

	public function __construct( $plugin_name, $version ) {

		self::$plugin_name = $plugin_name;
		self::$version     = $version;

	}

    /**
     * @param \Swagger\Client\ApiException $e
     * @param string $action
     * @return WP_Error
     */
	public static function swagger_exception( $e, $action = '' ) {

		$code     = $e->getCode();
		$message  = '';
		$warnings = [];

		$responseBody = $e->getResponseBody();

		$body = json_decode( $responseBody->errorMessage );

		if ( $code === 404 ) {
			$message = 'There was no response from the host. Please check that the host url is correct.';
		} elseif ( $code === 401 ) {
			$message = 'The API Key or Application Key set is incorrect.';
		} else {
			$code    = 400;
			$message = $e->getMessage();
		}

		// StatusCode 4000 seems be what is used when there is a duplicate Automation
		// TODO: Refactor this into something more universal. The API gives us plenty of info, we should use it
		if ( $body !== null && $body->statusCode === 4000 && $code === 400 ) {
			$message = $body->errorMessage;
		}

		TruEdit_Log::exception( $message, $e );

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

		TruEdit_Log::exception( $message, $e);

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

		TruEdit_Log::exception( ( ! empty( $action ) ? ucwords( $action ) . ' : ' : '' ) . $message, $e );

		return new WP_Error(
			'ERROR', $message, [
				'status'   => $code,
				'warnings' => $warnings,
			]
		);

	}


}

