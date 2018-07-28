<?php

class TruEdit_Publish {

	private $automation_id;
	private $job_id;
	private $output_type_id;

	private $automation; // the WordPress post that is an automation
	private $opts;

	private $log_info;

	/**
	 * $automation_id
	 * $job_id
	 * $output_type_id
	 * $opts
	 */
	public function __construct( $automation_id, $job_id, $output_type_id, $opts = [] ) {

		if ( ! TruEdit_Has::zipArchive() ) {
			throw new TruEdit_Exception( 'NO_ZIP_ARCHIVE' );
		}

		$this->load_dependencies();

		$this->automation_id  = $automation_id; // in auto id
		$this->job_id         = $job_id; // int
		$this->output_type_id = $output_type_id; // int

		$this->automation = new TruEdit_Post_Automation();
		$this->automation->setPost( $automation_id );

		// Prefill all options here and then we can just load whatever we need later.
		$this->opts = new stdClass();
		$post_meta  = $this->automation->post_meta;

		foreach ( $this->automation->getPublishOpts() as $key => $settings ) {

			if ( 'prompt_on_run' === $post_meta->{$key} ) {
				$this->opts->{$key} = $opts->{$key};
			} else {
				$this->opts->{$key} = $post_meta->{$key};
			}
		}

	}

	private function load_dependencies() {

		global $wp_rewrite;
		if ( is_null( $wp_rewrite ) ) {
			$wp_rewrite = new wp_rewrite;
		}

		// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
		require_once( ABSPATH . 'wp-admin/includes/image.php' );

		wp_functionality_constants();

	}

	public function create_update() {

		/**
		 * Retreive the zip file.
		 */
		try {
			$resource     = new TruEdit_Resource_Job();
			$zip_abs_path = $resource->read( $this->job_id, $this->output_type_id );
		} catch ( \Swagger\Client\ApiException $e ) {
			throw new TruEdit_Exception( 'ZIP_DOES_NOT_EXIST' );
		}

		$zip = new ZipArchive;
		$zip->open( $zip_abs_path );

		if ( 0 === $zip->numFiles ) {
			throw new TruEdit_Exception( 'ZIP_NO_FILES' );
		}

		if ( ! $zip->getFromName( 'index.html' ) ) {
			throw new TruEdit_Exception( 'ZIP_INDEX_NOT_FOUND' );
		}

		$html = $zip->getFromName( 'index.html' );
		$doc  = new DOMDocument();
		@$doc->loadHTML( $html, LIBXML_NOWARNING );

		$post = $this->postify( $this->opts->publish_type );

		// TODO: The separation between images and video is a little iffy right now, this is due to Video being patched in
		//  a little later. This is a good place for a refactor

		// Repair all images
		$this->update_media( $doc, MediaTypeEnum::Image, $post->ID, $zip_abs_path );

		// Repair all videos
		$this->update_media( $doc, MediaTypeEnum::Video, $post->ID, $zip_abs_path );

		/**
		 * Get the titles based on the option publish_title
		 * Defaults to H1
		 * --------------------------------------------------
		 */
		$titles  = [];
		$heading = $this->opts->publish_title;

		foreach ( $doc->getElementsByTagName( $heading ) as $item ) {
			$titles[] = $item->textContent;
		}

		/**
		 * Update the temporary post with all the data we just created
		 * --------------------------------------------------
		 */
		$sxml  = simplexml_import_dom( $doc );
		$title = count( $titles ) > 0 ? $titles[0] : '';
		$body  = $this->replace( $sxml->body->children()->asXML() );

		/** Log */ $this->add_to_log_info( 'title', $title );

		$new_post = [
			'ID'           => $post->ID,
			'post_title'   => $title,
			'post_excerpt' => $body,
			'post_content' => $body,
			'post_type'    => $this->opts->publish_type,
			'post_status'  => $this->opts->publish_status,
		];
		$success  = wp_update_post( $new_post, true );

		if ( 'post' === $this->opts->publish_type ) {
			wp_set_post_terms( $post->ID, 'post-format-' . $this->opts->publish_format, 'post_format' );
		}

		/** Log */ $this->add_to_log_info( 'post_type', $this->opts->publish_type );

		/**
		 * Remove the tempoary zip file.
		 * --------------------------------------------------
		 */
		unlink( $zip_abs_path );

		TruEdit_Log::info(
			'Succesfully published and ' . $this->log_info['method_type'] .
			' ' . $this->log_info['post_type'] . ' ' . $this->log_info['title'] . '.'
		);

		return (int) $post->ID;

	}

	/**
	 * Checks if there is already an existing post attached to the
	 * automation based on the job_id attached ot teh post
	 * --------------------------------------------------
	 */
	private function postify( $post_type ) {

		$query = new WP_Query(
			[
				'posts_per_page' => 1,
				'post_status'    => 'any',
				'post_type'      => [ $post_type ], // If more posttypes are required, update here
				'meta_query'     => [
					[
						'key'     => 'job_id',
						'value'   => strval( $this->job_id ),
						'compare' => '=',
					],
				],
			]
		);

		$posts = $query->posts;

		if ( count( $posts ) === 1 ) {
			$this->add_to_log_info( 'method_type', 'updated' );
			return $posts[0];
		} elseif ( count( $posts ) === 0 ) {
			return $this->create_new_post( $this->job_id );
		} else {
			throw new TruEdit_Exception( 'MULTIPLE_JOB_ID_ATTACHED' );
		}

	}

	private function create_new_post( $job_id ) {

		$post_id = wp_insert_post(
			[
				'post_title'   => 'Creating...',
				'post_excerpt' => '',
				'post_content' => '',
				'post_status'  => 'draft',
				'post_type'    => $this->opts->publish_type,
			], true
		);

		update_post_meta( $post_id, 'job_id', $job_id );

		$this->add_to_log_info( 'method_type', 'created' );

		return get_post( $post_id );

	}

	private function replace( $text ) {

		$new_str = $text;

		$new_str = str_replace( '&nbsp;', '', $new_str );

		$new_str = str_replace( '&#13;', '', $new_str );

		// Add custom trims here
		/**
		 * for loop
		 * looop some potential replacements
		 */
		// $new_str = str_replace($replacer, $replacement, $new_str)

		return $new_str;

	}

	/**
	 * @param $post_id int eg. 100
	 * @param $file_id int eg. 150
	 * @return string Image Path
	 */
	private function get_attachment( $post_id, $file_id ) {

		$images = get_attached_media( 'image', $post_id );

		foreach ( $images as $image ) {
			if ( pathinfo( $image->guid )['filename'] === $file_id ) {
				return $image;
			}
		}

		return null;

	}

	/**
	 * Method to update all the media assets (img, video tags) and make them usable within WordPress
	 * @param $doc DOMDocument
	 * @param $media_type integer Should be an enum from MediaTypeEnum
	 * @param $postId integer WordPress Post ID
	 * @param $zip_path string Absolute path to the zip content
	 * @throws Exception
	 */
	private function update_media( $doc, $media_type, $postId, $zip_path ) {
		/**
		 * We separated the loops because we didn't want to replace an image more than
		 * once if it occurred in the document more than once.
		 * This way, we do was required then have an key/value array with the key
		 * the ID of the filename.
		 */

		switch ( $media_type ) {
			case MediaTypeEnum::Image:
				$tag_name         = 'img';
				$url_attribute    = 'src';
				$mime_type_prefix = 'image';
				break;
			case MediaTypeEnum::Video:
				$tag_name         = 'video';
				$url_attribute    = 'src';
				$mime_type_prefix = 'video';
				break;
			default:
				throw new Exception( 'Unknown media type' );
		}

		$mediaElements = $doc->getElementsByTagName( $tag_name );
		$media_items   = [];
		foreach ( $mediaElements as $element ) {
			if ( $element->getAttribute( $url_attribute ) !== 'null' ) {
				$media_items[] = substr( $element->getAttribute( $url_attribute ), 2 );
			}
		}

		/**
		 * Upload the image if it doesn't exist, else we replace it.
		 * Then we get the urls for each image.
		 * We have to upload the attachments first because the links
		 * they create will be placed into the body.
		 */
		$urls = [];
		foreach ( array_unique( $media_items ) as $media_item ) {
			$file_id = pathinfo( $media_item, PATHINFO_FILENAME ); // 150

			$attachment = $this->get_attachment( $postId, $file_id );

			if ( ! is_null( $attachment ) ) {

				$dateTime = strtotime( $attachment->post_date );
				$year     = date( 'Y', $dateTime );
				$month    = date( 'm', $dateTime );

				// Get the absolute path of the exiting file
				$dir                 = wp_upload_dir()['basedir'] . '/' . $year . '/' . $month;
				$absolute_path_in_wp = $dir . '/' . pathinfo( $media_item, PATHINFO_BASENAME );

				copy( 'zip://' . $zip_path . '#' . $media_item, $absolute_path_in_wp );

				$media_id = $attachment->ID;

				if ( $media_type == MediaTypeEnum::Image ) {
					$attach_data = wp_generate_attachment_metadata( $media_id, $absolute_path_in_wp );
					wp_update_attachment_metadata( $media_id, $attach_data );
				}

				$urls[ pathinfo( $media_item, PATHINFO_FILENAME ) ] = $attachment->guid;

			} else {

				$absolute_path_in_wp = wp_upload_dir()['path'] . '/' . pathinfo( $media_item, PATHINFO_BASENAME );
				copy( 'zip://' . $zip_path . '#' . $media_item, $absolute_path_in_wp );

				$pathinfo = pathinfo( $media_item );

				$url        = wp_upload_dir()['url'] . '/' . pathinfo( $media_item, PATHINFO_BASENAME );
				$attachment = array(
					'guid'           => $url,
					'post_mime_type' => $mime_type_prefix . '/' . pathinfo( $media_item, PATHINFO_EXTENSION ),
					'post_title'     => '',
					'post_content'   => '',
					'post_status'    => 'inherit',
				);

				// Generate the metadata for the attachment, and update the database record.
				$media_id = wp_insert_attachment( $attachment, $absolute_path_in_wp, $postId );

				if ( $media_type == MediaTypeEnum::Image ) {
					$attach_data = wp_generate_attachment_metadata( $media_id, $absolute_path_in_wp );
					wp_update_attachment_metadata( $media_id, $attach_data );
				}

				$urls[ pathinfo( $media_item, PATHINFO_FILENAME ) ] = $url;

			}
		}

		/**
		 * Replace the image into the html
		 * with any empty src to be #
		 */
		foreach ( $mediaElements as $element ) {
			$parent = $element->parentNode;
			$parent->removeChild( $element );

			$new_el = $element;

			$file_id = pathinfo( $new_el->getAttribute( $url_attribute ), PATHINFO_FILENAME );
			if ( $file_id !== 'null' ) {
				$new_el->setAttribute( $url_attribute, $urls[ $file_id ] );
				$parent->appendChild( $new_el );
			} else {
				$new_el->setAttribute( $url_attribute, '#' );
				$parent->appendChild( $new_el );
			}
		}
	}

	private function add_to_log_info( $key, $value ) {

		$this->log_info[ $key ] = $value;

	}
}


/**
 * Class MediaTypeEnum
 * This is basic PHP enum object. This and the other media stuff should be refactored into a separate class
 */
abstract class MediaTypeEnum {
	const Image = 0;
	const Video = 1;


}
