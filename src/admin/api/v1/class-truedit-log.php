<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/truedit/tewppi
 * @since      1.0.0
 *
 * @package    TruEdit
 * @subpackage TruEdit/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    TruEdit
 * @subpackage TruEdit/includes
 * @author     TruEdit <sdk@truedit.com>
 */
class TruEdit_ApiRoute_Log implements TruEdit_ApiRoute {

	private $plugin_name;
	private $version;

	private $route_version;
	private $route;
	private $routes;

	// These are the comment types to filter exclusively to
	private static $commentTypes = [
		'TruEdit_log_info',
		'TruEdit_log_error',
	];

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->route         = 'log';
		$this->route_version = 1;

		$this->routes = [
			'read' => [
				'route'   => $this->route,
				'options' => [
					'methods'  => WP_REST_Server::READABLE,
					'callback' => [
						$this,
						'read',
					],
				],
			],
		];
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_dependencies() {}

	/**
	 * Get/Set
	 */
	public function get_route_version() {
		return $this->route_version;
	}

	public function get_routes() {
		return $this->routes;
	}

	/**
	 * CRUD
	 */
	public function read( WP_REST_Request $request ) {

		try {

			if ( empty( $request['page'] ) ) {
				throw new TruEdit_Exception(
					'ARG_REQUIRED', [
						'arg' => 'page',
					]
				);
			}

			if ( empty( $request['count'] ) ) {
				throw new TruEdit_Exception(
					'ARG_REQUIRED', [
						'arg' => 'count',
					]
				);
			}

			$page  = (int) $request['page'];
			$count = (int) $request['count'];

			$comments = self::getComments( $page, $count );

			// TODO: Remove this functionality. Will require changes on the SPA as well
			foreach ( $comments as $comment ) {
				$comment['comment_type'] = str_replace( 'TruEdit_log_', '', $comment['comment_type'] );
			}

			$total      = $this->getTotal();
			$totalPages = ceil( $total / $count ) ? ceil( $total / $count ) : 1;

			return new WP_REST_Response(
				$comments, 200, [
					'X-WP-Total'      => $total,
					'X-WP-TotalPages' => $totalPages,
				]
			);

		} catch ( TruEdit_Exception $e ) {

			return TruEdit_Handle::truedit_exception( $e );

		} catch ( Exception $e ) {

			return TruEdit_Handle::exception( $e );

		}

	}

	public function create( WP_REST_Request $request ) {}
	public function update( WP_REST_Request $request ) {}
	public function delete( WP_REST_Request $request ) {}

	/**
	 * Privates
	 */
	private function getTotal() {
		return get_comments(
			[
				'type'  => self::$commentTypes,
				'count' => true,
			]
		);
	}

	private static function removeCommentFilter() {
		remove_filter( 'comments_clauses', [ TruEdit::instance()->getTrueditAdmin(), 'truedit_comments_clauses' ] );
	}

	// TODO: Move this into a separate service.
	public static function getComments( $page, $count ) {
		// There is a comment filter to remove TruEdit logs from the rest of the system. This removes that filter
		self::removeCommentFilter();

		$commentsWithMetaData = [];

		$comments = get_comments(
			[
				'type'   => self::$commentTypes,
				'order'  => 'DESC',
				'number' => $count,
				'offset' => ( $page - 1 ) * $count,
			]
		);

		foreach ($comments as $comment) {
		    $commentWithMetaData = (array)$comment;
		    $commentMetaData = [
                'original_message' => get_comment_meta( $commentWithMetaData['comment_ID'], 'original_message'),
                'error_code' => get_comment_meta( $commentWithMetaData['comment_ID'], 'error_code'),
                'file' => get_comment_meta( $commentWithMetaData['comment_ID'], 'file'),
                'line_number' => get_comment_meta( $commentWithMetaData['comment_ID'], 'line_number')
            ];

            $commentWithMetaData['metadata'] = $commentMetaData;
            $commentsWithMetaData[] = $commentWithMetaData;
        }

        return $commentsWithMetaData;
	}


}
