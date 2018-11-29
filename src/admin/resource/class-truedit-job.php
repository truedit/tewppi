<?php /** @noinspection PhpCSValidationInspection */

class TruEdit_Resource_Job extends TruEdit_Resource {

	private $client;

	public function __construct() {

		parent::__construct();
		$this->client = new TruEdit_Client();

		$this->api = new Swagger\Client\Api\FileApi(
			$this->client,
			$this->getConfig()
		);

	}

	public function read( $job_id, $output_type_id ) {

		$dl = true; // bool | dl



		try {
			$response = $this->api->retrieveJobOutputFileUsingGET( $job_id, $output_type_id, $dl, $this->x_api_key, $this->x_app_api_key, $this->accept_language );

			$fileName = uniqid() . '.zip';

			$this->add_zip_upload_allowed();
			$file = wp_upload_bits($fileName, null, $response);
			$file = apply_filters( 'wp_handle_upload', $file );

            $this->remove_zip_upload_allowed();

			return $file['file'];

		} catch ( Exception $e ) {
            $this->remove_zip_upload_allowed();
			throw $e;
		}
	}

	public function create() {

	}

	public function update() {

	}

	public function delete() {

	}

    public function allow_zip_files($existing_mimes = []){
        $existing_mimes['zip'] = 'application/zip';
        $existing_mimes['gz'] = 'application/x-gzip';
        return $existing_mimes;

    }

    public function add_zip_upload_allowed() {
        add_filter('upload_mimes', [$this, 'allow_zip_files'], 999, 1);
    }

    public function remove_zip_upload_allowed() {
        remove_filter('upload_mimes', [$this, 'allow_zip_files']);
    }
}
