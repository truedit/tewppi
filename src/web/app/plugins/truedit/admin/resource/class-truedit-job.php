<?php

class TruEdit_Resource_Job extends TruEdit_Resource {

	private $tmp_filename;
	private $handle;
	private $client;

	public function __construct() {

		parent::__construct();
		global $wp_filesystem;
	  if (empty($wp_filesystem)) {
    require_once (ABSPATH . '/wp-admin/includes/file.php');
    WP_Filesystem();
}
		$folder = wp_upload_dir()['basedir'] . '/TruEdit/';
		if ( ! file_exists( $folder ) ) {
			$wp_filesystem->mkdir( $folder, 0777, true );
		}

		
		$this->tmp_filename = wp_tempnam();
		$this->handle       = fopen( $this->tmp_filename, 'w' );
		$this->client       = new TruEdit_Client( [ 'sink' => $this->handle ] );

		$this->api = new Swagger\Client\Api\FileApi(
			$this->client,
			$this->getConfig()
		);

	}

	public function read( $job_id, $output_type_id ) {

		$dl = true; // bool | dl

		try {
			$this->api->retrieveJobOutputFileUsingGET( $job_id, $output_type_id, $dl, $this->x_api_key, $this->x_app_api_key, $this->accept_language );
			
			 global $wp_filesystem;
	  if (empty($wp_filesystem)) {
    require_once (ABSPATH . '/wp-admin/includes/file.php');
    WP_Filesystem();
}
			
			
			/**
			* @fclose( $this->handle );
			*/
			return $this->tmp_filename;

		} catch ( Exception $e ) {
			throw $e;
		}

	}

	public function create() {

	}

	public function update() {

	}

	public function delete() {

	}

}
