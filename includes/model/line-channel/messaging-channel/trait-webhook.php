<?php
/**
 * Messaging APIチャネルのWebhook関連の処理
 *
 * @package LClutch\Model\Line_Channel\Messaging_Channel
 */

namespace LClutch\Model\Line_Channel\Messaging_Channel;

use InvalidArgumentException;
use LClutch\LineApi\MessagingApi\ApiException;
use LClutch\LineApi\MessagingApi\Model\SetWebhookEndpointRequest;
use LClutch\API\Line_Messaging_API\Webhook_API;
use LClutch\Model\DTO\Webhook_Setting_DTO;
use LClutch\Model\Exception\Code;
use LClutch\LineApi\MessagingApi\Api\MessagingApiApi as MessagingApi;
use RuntimeException;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Webhook_Trait {

	use Messaging_API_Trait;

	/**
	 * Webhookエンドポイントの登録
	 *
	 * @throws InvalidArgumentException 引数例外.
	 * @throws RuntimeException 登録失敗.
	 */
	public function register_webhook_endpoint() {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) {
					$route    = Webhook_API::get_instance();
					$endpoint = $route->get_endpoint_url();

					$request = new SetWebhookEndpointRequest(
						array(
							'endpoint' => $endpoint,
						)
					);
					$client->setWebhookEndpoint( $request );
					return true;
				}
			);
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				case 400:
					throw new InvalidArgumentException( '無効なWebhook URLが指定されています。', Code::INVALID_URL, $e );
				default:
					throw new RuntimeException( 'Webhookエンドポイントの登録に失敗しました。', Code::MESSAGING_API_ERROR, $e );
			}
		}
	}

	/**
	 * Webhookエンドポイントの確認
	 *
	 * @return Webhook_Setting_DTO
	 * @throws InvalidArgumentException 引数例外.
	 * @throws RuntimeException 確認失敗.
	 */
	public function check_webhook_endpoint() {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) {
					$response = $client->getWebhookEndpoint();

					$endpoint       = $response->getEndpoint();
					$route          = Webhook_API::get_instance();
					$saved_endpoint = $route->get_endpoint_url();

					return new Webhook_Setting_DTO(
						array(
							'endpoint' => $endpoint,
							'is_valid' => $endpoint === $saved_endpoint,
							'active'   => $response->getActive(),
						)
					);
				}
			);
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				case 404:
					throw new InvalidArgumentException( 'チャネルにWebhookエンドポイントが設定されていません。', Code::NOT_FOUND, $e );
				default:
					throw new RuntimeException( 'Webhookエンドポイントの確認に失敗しました。', Code::MESSAGING_API_ERROR, $e );
			}
		}
	}
}
