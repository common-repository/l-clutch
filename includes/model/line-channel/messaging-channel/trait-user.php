<?php
/**
 * Messaging APIチャネルのユーザー関連の処理
 *
 * @package LClutch\Model\Line_Channel\Messaging_Channel
 */

namespace LClutch\Model\Line_Channel\Messaging_Channel;

use InvalidArgumentException;
use LClutch\Model\DTO\Line_Account\Line_Account_DTO;
use LClutch\Model\Exception\Code;
use LClutch\LineApi\MessagingApi\ApiException;
use LClutch\LineApi\MessagingApi\Api\MessagingApiApi as MessagingApi;
use RuntimeException;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait User_Trait {

	use Messaging_API_Trait;

	/**
	 * ユーザー情報を取得
	 *
	 * @param string $user_id ユーザーID.
	 * @return Line_Account_DTO ユーザー情報.
	 * @throws InvalidArgumentException 引数例外.
	 * @throws RuntimeException 取得失敗.
	 */
	public function get_user_profile( string $user_id ): Line_Account_DTO {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) use ( $user_id ) {
					$response = $client->getProfile( $user_id );
					return Line_Account_DTO::from_profile_response( $response );
				}
			);
		} catch ( InvalidArgumentException $e ) {
			throw new RuntimeException( 'ユーザー情報の取得に失敗しました。', Code::MESSAGING_API_ERROR, $e );
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				case 400:
					throw new InvalidArgumentException( 'ユーザーIDが不正です', 0, $e );
				case 404:
					throw new InvalidArgumentException( 'ユーザーが見つかりません', Code::NOT_FOUND, $e );
				default:
					throw new RuntimeException( 'ユーザー情報の取得に失敗しました。', Code::MESSAGING_API_ERROR, $e );
			}
		}
	}
}
