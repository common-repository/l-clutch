<?php
/**
 * LINE Messaging APIチャネル
 *
 * @package LClutch\Model\Line_Channel
 */

namespace LClutch\Model\Line_Channel;

use LClutch\Model\DTO\Bot_Info_DTO;
use LClutch\Model\Exception\Code;
use LClutch\Model\Line_Channel\Messaging_Channel\RichMenu_Trait;
use LClutch\Model\Line_Channel\Messaging_Channel\User_Trait;
use LClutch\Model\Line_Channel\Messaging_Channel\Webhook_Trait;
use LClutch\LineApi\MessagingApi\Api\MessagingApiApi as MessagingApi;
use LClutch\LineApi\MessagingApi\ApiException;
use RuntimeException;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * LINE Messaging APIチャネル
 */
class Messaging_Channel extends Line_Channel_Base {

	use \LClutch\Utils\Singleton_Trait;
	use Webhook_Trait;
	use RichMenu_Trait;
	use User_Trait;

	/** オプションのキー */
	protected const OPTION_KEYS = array(
		'client_id'     => 'l-clutch_line-messaging-api-channel-client-id',
		'client_secret' => 'l-clutch_line-messaging-api-channel-client-secret',
		'basic_id'      => 'l-clutch_basic-id',
	);

	/** トランジェントのキー */
	protected const TRANSIENT_KEYS = array(
		'access_token' => 'l-clutch_line-messaging-api-channel-access-token',
	);

	/**
	 * ボットの基本ID
	 *
	 * @var string
	 */
	private ?string $basic_id = null;

	/**
	 * BASIC IDを取得
	 */
	public function get_basic_id() {
		if ( $this->basic_id === null ) {
			$this->basic_id = get_option( 'l-clutch_basic-id' );
		}
		return $this->basic_id;
	}

	/**
	 * アクセストークンをセット
	 *
	 * @param string $access_token アクセストークン.
	 * @param int    $expires_in 有効期限.
	 */
	protected function set_access_token( $access_token, $expires_in ) {
		$client = $this->get_messaging_api_client();
		$client->getConfig()->setAccessToken( $access_token );
		$blob_client = $this->get_messaging_blob_api_client();
		$blob_client->getConfig()->setAccessToken( $access_token );

		parent::set_access_token( $access_token, $expires_in );
	}

	/**
	 * BASIC IDをセット
	 *
	 *  @param string $basic_id BASIC ID.
	 */
	private function set_basic_id( $basic_id ) {
		$updated = update_option( self::OPTION_KEYS['basic_id'], $basic_id, 'no' );
		if ( $updated ) {
			$this->basic_id = $basic_id;
		}
	}

	/**
	 * 署名の検証
	 *
	 * @param string $body      リクエストボディ.
	 * @param string $signature 署名.
	 */
	public function verify_signature( $body, $signature ) {
		$hash       = hash_hmac( 'sha256', $body, $this->get_client_secret(), true );
		$calculated = base64_encode( $hash );

		return $calculated === $signature;
	}

	/**
	 * ボット情報を取得
	 *
	 * @return Bot_Info_DTO
	 */
	public function get_bot_info() {
		$bot_info = new Bot_Info_DTO(
			array(
				'basic_id' => $this->get_basic_id(),
			)
		);
		return $bot_info;
	}

	/**
	 * ボット情報を取得
	 *
	 * @return Bot_Info_DTO
	 * @throws RuntimeException ボット情報の取得に失敗した場合.
	 */
	public function fetch_bot_info() {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) {
						$response = $client->getBotInfo();

						$basic_id = $response->getBasicId();
						$this->set_basic_id( $basic_id );
						$bot_info = new Bot_Info_DTO(
							array(
								'basic_id' => $basic_id,
							)
						);
						return $bot_info;
				}
			);
		} catch ( ApiException $e ) {
			throw new RuntimeException( 'ボット情報の取得に失敗しました。', Code::MESSAGING_API_ERROR, $e );
		}
	}
}
