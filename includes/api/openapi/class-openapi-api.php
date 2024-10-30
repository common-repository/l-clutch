<?php
/**
 * OpenAPIのAPI
 *
 * @package LClutch\API\OpenAPI
 */

namespace LClutch\API\OpenAPI;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\API\LC_REST_Controller;
use LClutch\Utils\Initialize_Trait;
use WP_REST_Controller;
use WP_REST_Response;
use WP_REST_Server;

/**
 * OpenAPIのAPI
 */
class OpenAPI_API extends WP_REST_Controller {

	use Initialize_Trait;

	const PATH = 'openapi';

	/**
	 * コンストラクタ
	 */
	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_routes' ) );
	}

	/**
	 * ルートの登録
	 */
	public function register_routes() {
		register_rest_route(
			LC_REST_Controller::NAMESPACE,
			'/' . self::PATH,
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'get_item' ),
				'permission_callback' => '__return_true',
			),
		);
	}

	/**
	 * APIのスキーマ
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	public function get_item( $request ) {
		$schema = array(
			'openapi'    => '3.1.0',
			'info'       => array(
				'title'       => 'LClutch',
				'description' => 'LClutchのOpenAPI',
				'version'     => '1.0.4',
			),
			'servers'    => array(
				array(
					'url' => get_rest_url( null, '/' . LC_REST_Controller::NAMESPACE ),
				),
			),
			'paths'      => array_merge(
				LC_REST_Controller::get_path_schemas(),
				WP_Schema::get_path_schemas()
			),
			'components' => array(
				'parameters' => OpenAPI_Parameters::get_components(),
				'schemas'    => OpenAPI_Schemas::get_components(),
				'headers'    => OpenAPI_Headers::get_components(),
			),
		);

		return new WP_REST_Response( $schema );
	}
}
