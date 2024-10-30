<?php
/**
 * LINEログインの処理
 *
 * @package LClutch\Model\Line_Channel\Login_Channel
 */

namespace LClutch\Model\Line_Channel\Login_Channel;

use InvalidArgumentException;
use RuntimeException;
use LClutch\Model\DTO\Line_Account\Access_Token_DTO;
use LClutch\Model\Exception\Code;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Line_Login_Trait {

	/**
	 * 認証リクエストURL
	 *
	 * @var string
	 */
	private static $authorize_request_url = 'https://access.line.me/oauth2/v2.1/authorize?response_type=code&client_id=%1$s&redirect_uri=%2$s&state=%3$s&scope=%4$s';


	/**
	 * Auth URL
	 *
	 * @var string[]
	 */
	private static $auth_url = array(
		'token'  => 'https://api.line.me/oauth2/v2.1/token',
		'verify' => 'https://api.line.me/oauth2/v2.1/verify',
	);

	/**
	 * スコープ
	 *
	 * @var string
	 */
	private static $scope = 'openid%20profile';

	/**
	 * 認証リクエストURLを生成
	 *
	 * @param string                $state ステート.
	 * @param 'auth'|'check-linked' $mode モード.
	 */
	public function generate_line_login_url( string $state, string $mode = 'auth' ) {
		$client_id    = $this->get_client_id();
		$redirect_uri = home_url( '/?l-clutch_line-login=' . $mode );
		$url          = sprintf( self::$authorize_request_url, $client_id, rawurlencode( $redirect_uri ), $state, self::$scope );
		return apply_filters( 'lclutch_line_login_url', $url );
	}

	/**
	 * アクセストークンを取得
	 *
	 * @param string $code 認証コード.
	 * @param string $redirect_url リダイレクトURL.
	 * @throws InvalidArgumentException エラー.
	 * @throws RuntimeException エラー.
	 */
	public function get_user_access_token( string $code, string $redirect_url ): Access_Token_DTO {
		// リクエストを送信.
		$response = wp_remote_post(
			self::$auth_url['token'],
			array(
				'method'  => 'POST',
				'headers' => array(
					'Content-Type' => 'application/x-www-form-urlencoded',
				),
				'body'    => http_build_query(
					array(
						'grant_type'    => 'authorization_code',
						'code'          => $code,
						'redirect_uri'  => $redirect_url,
						'client_id'     => $this->get_client_id(),
						'client_secret' => $this->get_client_secret(),
					)
				),
			)
		);

		if ( is_wp_error( $response ) ) {
			throw new RuntimeException( 'WordPress内部でエラーが発生しました。' );
		}

		if ( $response['response']['code'] === 400 ) {
			throw new InvalidArgumentException( 'LINEログインに失敗しました。' );
		}

		if ( $response['response']['code'] !== 200 ) {
			throw new RuntimeException( 'LINEログインに失敗しました。' );
		}

		$body         = json_decode( $response['body'], true );
		$access_token = new Access_Token_DTO(
			array(
				'access_token' => $body['access_token'],
				'expires_in'   => $body['expires_in'],
			)
		);
		return $access_token;
	}

	/**
	 * アクセストークンの検証URL
	 *
	 * @param string $access_token アクセストークン.
	 */
	private static function get_verify_url( string $access_token ) {
		return self::$auth_url['verify'] . "?access_token=$access_token";
	}

	/**
	 * アクセストークンを検証
	 *
	 * @param Access_Token_DTO $access_token アクセストークン.
	 * @throws InvalidArgumentException アクセストークンの検証に失敗した場合.
	 * @throws RuntimeException アクセストークンの検証に失敗した場合.
	 */
	public function verify( Access_Token_DTO $access_token ): Access_Token_DTO {
		$response = wp_remote_get( self::get_verify_url( $access_token->get_access_token() ) );
		if ( wp_remote_retrieve_response_code( $response ) === 400 ) {
			throw new InvalidArgumentException( 'アクセストークンの検証に失敗しました。', Code::INVALID_ACCESS_TOKEN );
		}

		if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) !== 200 ) {
			throw new RuntimeException( 'アクセストークンの検証に失敗しました。', Code::LOGIN_API_ERROR );
		}

		$body         = json_decode( $response['body'], true );
		$access_token = $this->verify_response_with_access_token( $body, $access_token );

		return $access_token;
	}

	/**
	 * アクセストークンの検証レスポンスを検証する
	 *
	 * @param array            $body レスポンスボディ.
	 * @param Access_Token_DTO $access_token アクセストークン.
	 * @throws InvalidArgumentException チャネルIDが一致しない場合.
	 */
	private function verify_response_with_access_token( array $body, Access_Token_DTO $access_token ) {
		if ( ! array_key_exists( 'client_id', $body ) || $body['client_id'] !== $this->get_client_id() ) {
			throw new InvalidArgumentException( 'チャネルIDが一致しません。', Code::INVALID_ACCESS_TOKEN );
		}

		return $access_token->with(
			array(
				'client_id'  => $body['client_id'],
				'expires_in' => $body['expires_in'],
			)
		);
	}
}
