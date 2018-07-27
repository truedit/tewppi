<?php

abstract class TruEdit_Resource {

	private $client;
	private $config;

	public $api;

	protected $x_api_key;
	protected $x_app_api_key;
	protected $accept_language;

	public function __construct() {

		$this->client = new TruEdit_Client();
		$this->config = new TruEdit_Configuration();

		$this->x_api_key       = $this->getConfig()->getApiKey( 'x_api_key' );
		$this->x_app_api_key   = $this->getConfig()->getApiKey( 'x_app_api_key' );
		$this->accept_language = 'application/json';

	}

	public function getClient() {

		return $this->client;

	}

	public function getConfig() {

		return $this->config;

	}

}
