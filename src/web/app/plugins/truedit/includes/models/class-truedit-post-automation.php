<?php

class TruEdit_Post_Automation {

	private $post;
	private $publish_opts;

	public function __construct() {

		$this->post = null;

		$this->load_publish_opts();

	}

	public function load_publish_opts() {

		$this->publish_opts = [
			'publish_action'     => [
				'publish_default' => 'create_update',
				'save_order'      => 1,
				'validate'        => function( $value, $form = [] ) {
					$values = [ 'create_update' ];

					if ( ! in_array( $value, $values ) ) {
						return false;
					}

					return true;
				},
			],
			'publish_status'     => [
				'publish_default' => 'draft',
				'save_order'      => 4,
				'validate'        => function( $value, $form = [] ) {
					$public_values  = [ 'prompt_on_run', 'draft', 'pending', 'publish' ];
					$private_values = [ 'private' ];

					if ( $form->publish_visibility === 'prompt_on_run' ) {
						if ( $value !== 'prompt_on_run' ) {
							return false;
						}
					}

					if ( $form->publish_visibility === 'public' ) {
						if ( ! in_array( $value, $public_values ) ) {
							return false;
						}
					}

					if ( $form->publish_visibility === 'private' ) {
						if ( ! in_array( $value, $private_values ) ) {
							return false;
						}
					}

					return true;

				},
			],
			'publish_title'      => [
				'publish_default' => 'h1',
				'save_order'      => 3,
				'validate'        => function( $value, $form = [] ) {
					$values = [ 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ];

					if ( ! in_array( $value, $values ) ) {
						return false;
					}

					return true;
				},
			],
			'publish_format'     => [
				'publish_default' => '0',
				'save_order'      => 7,
				'validate'        => function( $value, $form = [] ) {
					$values = [ '0', 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio', 'chat', 'status' ];

					if ( $form->publish_type === 'prompt_on_run' ) {
						if ( $value !== 'prompt_on_run' ) {
							return false;
						}
					}

					if ( ! in_array( $value, $values ) ) {
						return false;
					}

					return true;
				},
			],
			'publish_visibility' => [
				'publish_default' => 'public',
				'save_order'      => 2,
				'validate'        => function( $value, $form = [] ) {
					$values = [ 'prompt_on_run', 'public', 'private' ];
					if ( ! in_array( $value, $values ) ) {
						return false;
					}
					return true;
				},
			],
			'publish_author'     => [
				'publish_default' => 'current_user',
				'save_order'      => 5,
				'validate'        => function( $value, $form = [] ) {
					$values = [ 'current_user' ];

					if ( ! in_array( $value, $values ) ) {
						return false;
					}

					return true;
				},
			],
			'publish_type'       => [
				'publish_default' => 'post',
				'save_order'      => 6,
				'validate'        => function( $value, $form = [] ) {
					$values = [ 'prompt_on_run', 'post', 'page' ];

					if ( ! in_array( $value, $values ) ) {
						return false;
					}

					return true;
				},
			],
		];

	}

	public function setPost( $post_id ) {

		$post = get_post( $post_id );

		if ( ! $post ) {
			throw new TruEdit_Exception( 'AUTOMATION_DOES_NOT_EXIST' );
		}

		$post_meta = new stdClass();

		$post_meta->json          = get_post_meta( $post_id, 'json', true );
		$post_meta->automation_id = get_post_meta( $post_id, 'automation_id', true );

		foreach ( $this->getPublishOpts() as $key => $opts ) {
			$post_meta->{$key} = get_post_meta( $post_id, $key, true );
		}

		$post->post_meta = $post_meta;

		$this->post = $post;

	}

	public function getPost() {

		return $this->post;

	}

	public function getPublishOpts() {

		uasort(
			$this->publish_opts, function( $a, $b ) {
				return $a['save_order'] > $b['save_order'];
			}
		);

		return $this->publish_opts;

	}

	public function __get( $name ) {

		if ( isset( $this->post->{$name} ) ) {
			return $this->post->{$name};
		}

	}

	public function __toString() {

		return json_encode( $this->post );

	}

	public function saveAutomationId( $automation_id ) {

		update_post_meta( $this->post->ID, 'automation_id', $automation_id );
		$this->post->post_meta->automation_id = $automation_id;

	}

	public function saveJson( $json ) {

		update_post_meta( $this->post->ID, 'json', $json );
		$this->post->post_meta->json = $json;

	}

	public function saveMeta( $key, $value ) {

		update_post_meta( $this->post->ID, $key, $value );
		$this->post->post_meta->{$key} = $value;

	}

	public function validate( $key, $value, $form ) {

		call_user_func_array(
			$this->getPublishOpts()[ $key ]['validate'], [
				'value' => $value,
				'form'  => $form,
			]
		);

	}

}
