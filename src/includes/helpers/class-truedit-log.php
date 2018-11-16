<?php

class TruEdit_Log extends TruEdit_Levels {

	private $version;
	private $plugin_name;

	private $handlers;
	private $threshold;

	public function __construct( $plugin_name, $version ) {

		self::$plugin_name = $plugin_name;
		self::$version     = $version;

	}

	private static function should_handle( $level ) {
		return self::is_valid_level( $level );
	}

	private static function log( $level, $message, $context = [] ) {

		if ( ! self::should_handle( $level ) ) {
			// A config option with log levels selected.
		}
		if ( isset( $_SERVER['HTTP_HOST'] ) ) {

			$server_http_host = filter_var( wp_unslash( $_SERVER['HTTP_HOST'] ), FILTER_SANITIZE_STRING ); // Input var okay.
			; // Input var okay.
		} else {
			$server_http_host = '';
		}
		$commentId = wp_insert_comment(
			[
				'comment_author'       => 'TruEdit',
				'comment_author_email' => 'truedit@' . $server_http_host,
				'comment_author_url'   => '',
				'comment_content'      => $message,
				'comment_type'         => 'TruEdit_log_' . $level,
				'comment_parent'       => 0,
				'user_id'              => 0,
				'comment_author_IP'    => '',
				'comment_approved'     => 1,
				'comment_agent'        => 'TruEdit',
			]
		);

		return $commentId;
	}

    /**
     * @param $commentId int
     * @param $e Exception
     */
    private static function addLogDetail($commentId, $e) {
	    add_comment_meta($commentId, 'original_message', $e->getMessage());
	    add_comment_meta($commentId, 'error_code', $e->getCode());
	    add_comment_meta($commentId, 'file', $e->getFile());
	    add_comment_meta($commentId, 'line_number', $e->getLine());
    }

	public static function emergency( $message, $context = [] ) {
		self::log( TruEdit_Levels::EMERGENCY, $message, $context );
	}

	public static function alert( $message, $context = [] ) {
		self::log( TruEdit_Levels::ALERT, $message, $context );
	}

	public static function critical( $message, $context = [] ) {
		self::log( TruEdit_Levels::CRITICAL, $message, $context );
	}

	public static function error( $message, $context = [] ) {
		self::log( TruEdit_Levels::ERROR, $message, $context );
	}

	public static function warning( $message, $context = [] ) {
		self::log( TruEdit_Levels::WARNING, $message, $context );
	}

	public static function notice( $message, $context = [] ) {
		self::log( TruEdit_Levels::NOTICE, $message, $context );
	}

	public static function info( $message, $context = [] ) {
		self::log( TruEdit_Levels::INFO, $message, $context );
	}

	public function debug( $message, $context = [] ) {
		self::log( TruEdit_Levels::DEBUG, $message, $context );
	}

	public static function exception( $message, $e ) {
        $commentId = self::log(TruEdit_Levels::ERROR, $message, []);
        self::addLogDetail($commentId, $e);
    }

}
