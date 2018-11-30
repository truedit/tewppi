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

			if ( $post_meta->{$key} === 'prompt_on_run' ) {
				$this->opts->{$key} = $opts->{$key};
			} else {
				$this->opts->{$key} = $post_meta->{$key};
			}
			unset( $settings );
		}

	}

	private function load_dependencies() {

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
			unset( $e );
		}

		$zip = new ZipArchive;
		$zip->open( $zip_abs_path );

		if ( $zip->numFiles === 0 ) {
			throw new TruEdit_Exception( 'ZIP_NO_FILES' );
		}

		if ( ! $zip->getFromName( 'index.html' ) ) {
			throw new TruEdit_Exception( 'ZIP_INDEX_NOT_FOUND' );
		}

		$html = $zip->getFromName( 'index.html' );

        $doc  = new DOMDocument();
        libxml_use_internal_errors(true);
		$doc->loadHTML( $html, LIBXML_NOWARNING );
        libxml_clear_errors();

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
		wp_update_post( $new_post, true );

		if ( $this->opts->publish_type === 'post' ) {
			wp_set_post_terms( $post->ID, 'post-format-' . $this->opts->publish_format, 'post_format' );
		}

		/** Log */ $this->add_to_log_info( 'post_type', $this->opts->publish_type );

		/**
		 * Remove the tempoary zip file.
		 * --------------------------------------------------
		 */
		  global $wp_filesystem;
	  if (empty($wp_filesystem)) {
    require_once (ABSPATH . '/wp-admin/includes/file.php');
    WP_Filesystem();
}
		$wp_filesystem->delete( $zip_abs_path , true);
		/**
		*unlink( $zip_abs_path );
		*/
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
				'posts_per_page' 		=> 1,
				'post_status'   		=> 'any',
				'post_type'      		=> [ $post_type ], // If more posttypes are required, update here		
				'ignore_sticky_posts' 	=> true,	
				'no_found_rows'			=> true,	
			    'meta_query'     		=> [
					[
						'key'    		=> 'job_id',
						'value'   		=> strval( $this->job_id ),
						'compare' 		=> '=',
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

		/** pdate_post_meta($this->automation->ID, 'post_id', $post_id); */
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

		// $new_str = str_replace($replacer, $replacement, $new_str)
		*/
		return $new_str;

	}

	/**
	 * @param $post_id int eg. 100
	 * @param $file_name int eg. 150
	 * @return string Image Path
	 */
	private function get_attachment($post_id, $file_name, $mime_type ) {

		$media_items = get_attached_media( $mime_type, $post_id );

		foreach ( $media_items as $media_item ) {
			if ( $media_item->post_name === $file_name ) {
				return $media_item;
			}
		}

		return null;

	}

	/**
	 * Method to update all the media assets (img, video tags) and make them usable within WordPress
	 * @param $doc DOMDocument
	 * @param $mediaType integer Should be an enum from MediaTypeEnum
	 * @param $post_id integer WordPress Post ID
	 * @param $zipPath string Absolute path to the zip content
	 * @throws Exception
	 */
	private function update_media($doc, $mediaType, $post_id, $zipPath ) {
		/**
		 * We separated the loops because we didn't want to replace an image more than
		 * once if it occurred in the document more than once.
		 * This way, we do was required then have an key/value array with the key
		 * the ID of the filename.
		 */

		switch ( $mediaType ) {
			case MediaTypeEnum::Image:
				$tagName        = 'img';
				$urlAttribute   = 'src';
				$mimeTypePrefix = 'image';
				break;
			case MediaTypeEnum::Video:
				$tagName        = 'video';
				$urlAttribute   = 'src';
				$mimeTypePrefix = 'video';
				break;
			default:
				throw new Exception( 'Unknown media type' );
		}

		$mediaElements = $doc->getElementsByTagName( $tagName );
		$mediaItems    = [];
		foreach ( $mediaElements as $element ) {
			if ( $element->getAttribute( $urlAttribute ) !== 'null' ) {
				$mediaItems[] = substr( $element->getAttribute( $urlAttribute ), 2 );
			}
		}

		/**
		 * Upload the image if it doesn't exist, else we replace it.
		 * Then we get the urls for each image.
		 * We have to upload the attachments first because the links
		 * they create will be placed into the body.
		 */
		$urls = [];


		// Open up the zip file ready to use
		$zip = new ZipArchive();
        $zip->open($zipPath);

        // Iterate over every media item in the document
        foreach ( array_unique( $mediaItems ) as $mediaItem ) {
            $file_name = pathinfo( $mediaItem, PATHINFO_FILENAME ); // 150
            $mime_type = $mimeTypePrefix . '/' . pathinfo( $mediaItem, PATHINFO_EXTENSION );


            // Extract the item from the zip and transfer to the uploads folder (VIP will upload to CDN)
            $data = stream_get_contents($zip->getStream($mediaItem));
            $file = wp_upload_bits($mediaItem, null, $data);
            $file = apply_filters( 'wp_handle_upload', $file );

            $url = $file['url'];

            // Add the image as an attachment
            $attachment = [
                'guid'           => $file['file'],
                'post_mime_type' => $mimeTypePrefix . '/' . pathinfo( $mediaItem, PATHINFO_EXTENSION ),
                'post_title'     => $file_name,
                'post_content'   => '',
                'post_status'    => 'inherit',
            ];

            // Update the attachment if it already exists
            $original_attachment = $this->get_attachment( $post_id, $file_name, $mime_type );

            if( $original_attachment != null ) {
                $attachment['ID'] = $original_attachment->ID;
            }

            // Insert the attachment
            $media_id = wp_insert_attachment($attachment, $file['file'], $post_id);


            // Generate thumbnails + metadata for images
            if ( $mediaType === MediaTypeEnum::Image ) {
                $attach_data = wp_generate_attachment_metadata( $media_id, $file['file'] );
                wp_update_attachment_metadata( $media_id, $attach_data );
            }

            $urls[$file_name] = $url;

        }

		/**
		 * Replace the image into the html
		 * with any empty src to be #
		 */
		foreach ( $mediaElements as $element ) {
			$parent = $element->parentNode;
			$parent->removeChild( $element );

			$new_el = $element;

			$file_name = pathinfo( $new_el->getAttribute( $urlAttribute ), PATHINFO_FILENAME );
			if ( $file_name !== 'null' ) {
				$new_el->setAttribute( $urlAttribute, $urls[ $file_name ] );
				$parent->appendChild( $new_el );
			} else {
				$new_el->setAttribute( $urlAttribute, '#' );
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
