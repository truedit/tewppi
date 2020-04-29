<?php

interface TruEdit_ApiRoute {

	public function get_route_version();

	public function get_routes();

	public function create( WP_REST_Request $request );

	public function read( WP_REST_Request $request );

	public function update( WP_REST_Request $request );

	public function delete( WP_REST_Request $request );

}
