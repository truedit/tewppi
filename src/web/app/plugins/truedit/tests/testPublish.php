<?php

class TestPublish extends WP_UnitTestCase {

	protected $database;

	protected $handler;

	public function setUp() {
		parent::setUp();

	}

	public function tearDown() {

	}

	public function test_post_is_published() {

		$p   = new TruEdit_ApiRoute_Publish( $this->plugin_name, $this->version );
		$res = $p->create( new WP_REST_Request() );

		$r = new WP_REST_Request();
		$r->set_body( '{"publish_action":"create_update","publish_author":"current_user","publish_format":"","publish_visibility":"private","publish_status":"private","publish_title":"h1","publish_type":"page","truedit":"true","post_type":"automation","id":"266"}' );

		$res = $p->create( $r );

		// Test post status.

		// $this->assertEquals('published', $post);

	}

}
