<?php
/**
 * Webhook API
 *
 * @package LClutch\API\Line_Messaging_API
 */

namespace LClutch\API\Line_Messaging_API;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\API\LC_REST_Controller;
use LClutch\Controller\Que_Controller;
use LClutch\Model\Line_Channel\Messaging_Channel;
use LClutch\Model\Entity\Webhook_Event\Webhook_Event;
use LClutch\Utils\Singleton_Trait;
use WP_REST_Controller;
use WP_REST_Response;
use WP_REST_Server;

/**
 * Webhook API
 */
class Webhook_API extends WP_REST_Controller {

	use Singleton_Trait;

	const PATH = 'line-messaging-api/webhook';

	/**
	 * コンストラクタ
	 */
	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_routes' ) );
	}

	/**
	 * エンドポイントのURLの取得
	 *
	 * @return string
	 */
	public function get_endpoint_url() {
		return rest_url( LC_REST_Controller::NAMESPACE . '/' . self::PATH . '/' );
	}

	/**
	 * ルートの登録
	 */
	public function register_routes() {
		register_rest_route(
			LC_REST_Controller::NAMESPACE,
			self::PATH,
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'receive' ),
				'permission_callback' => array( $this, 'verify_signature' ),
				'args'                => $this->get_endpoint_args_for_item_schema( false ),
			)
		);
	}

	/**
	 * リクエストの処理
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	public function receive( $request ) {
		$body = $request->get_body();
		$body = json_decode( $body, true );
		foreach ( $body['events'] as $event_input ) {
			$event = Webhook_Event::create( $event_input );

			// processメソッドがある場合はキューに追加.
			if ( method_exists( $event, 'process' ) ) {
				Que_Controller::get_instance()->add( time(), array( $event, 'process' ) );
			}
		}
		return new WP_REST_Response( null, 200 );
	}

	/**
	 * 署名の検証
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	public function verify_signature( $request ) {
		$channel   = Messaging_Channel::get_instance();
		$body      = $request->get_body();
		$signature = $request->get_header( 'x-line-signature' );
		$verified  = $channel->verify_signature( $body, $signature );
		return $verified;
	}
}
