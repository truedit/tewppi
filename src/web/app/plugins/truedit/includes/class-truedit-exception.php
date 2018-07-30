<?php

class TruEdit_Exception extends Exception {

	private $codes = [
		'NO_API_KEY'                     => 'No API Key set. Please visit the options page to add an API Key.',
		'NO_APP_API_KEY'                 => 'No Application Key set. Please contact TruEdit to receive your Application Key.',
		'SERVER_SETTINGS_NOT_TESTED'     => 'Please test your server settings is correct and validated with the host.',
		'NO_HTTPS'                       => 'TruEdit requires your website to use the HTTPS protocol.',
		'NO_ZIP_ARCHIVE'                 => 'TruEdit requires the Zip Archive library installed. Please install Zip Archive.',
		'NO_JSON'                        => 'TruEdit requires the JSON library installed. Please install JSON.',
		'INCORRECT_PHP_VERSION'          => 'TruEdit requires your website PHP version to be at least 5.5. Please update PHP.',
		'INCORRECT_WP_VERSION'           => 'TruEdit requires your website Wordpress version to be at least 4.7. Please update Wordpress.',
		'INCORRECT_HOST'                 => 'The host url entered is incorrect.',
		'INCORRECT_WRITE_PERMISSIONS'    => 'TruEdit requires the uploads folder to have the correct permissions. Please contact your administrator.',
		'ZIP_DOES_NOT_EXIST'             => 'The file attached to the job does not exist. Please Check In your changes to publish.',
		'ZIP_NO_FILES'                   => 'The downloaded ZIP file has no files to be extracted.',
		'ZIP_INDEX_NOT_FOUND'            => 'The downloaded ZIP file does not have index.html.',
		'ARG_REQUIRED'                   => 'Argument :arg is required.',
		'PROFILE_NOT_SUPPORTED'          => 'Profile :profile is not supported for publishing.',
		'NOT_PUBLISHED'                  => 'Post was not published.',
		'NO_JOB_ID_FOUND'                => 'Unable to publish because the JOB ID was not found.',
		'POST_NOT_FOUND'                 => 'Unable to find the post.',
		'AUTOMATION_DOES_NOT_EXIST'      => 'Automation does not exist.',
		'MULTIPLE_JOB_ID_ATTACHED'       => 'There are multiple posts attached to the same Job IDs.',
		'AUTOMATION_NAME_EXISTS'         => 'Name is ":name" already in use.',
		'AUTOMATION_NAME_GREATER_1'      => 'Automation name must be greater than 1 character.',
		'AUTOMATION_NAME_TOO_LONG'       => 'Automation name is too long. It must be less than 255 characters long.',
		'AUTOMATION_COULD_NOT_BE_DELETE' => 'Automation could not be deleted.',
	];

	public function __construct( $code, $context = [] ) {

		$message = $this->codes[ $code ];

		if ( count( $context ) ) {
			$replaced = [];
			foreach ( $context as $key => $value ) {
				$replaced[ ':' . $key ] = $value;
			}

			$message = strtr( $message, $replaced );
		}

		parent::__construct( $message );

	}

}
