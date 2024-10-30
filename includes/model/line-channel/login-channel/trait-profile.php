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
use LClutch\Model\DTO\Line_Account\Line_Account_DTO;
use LClutch\Model\Exception\Code;
use LClutch\Utils;
use LClutch\Utils\Array_Key_Converter;
use WpOrg\Requests\Response;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Profile_Trait {

	/**
	 * API URL
	 *
	 * @var string[]
	 */
	private static $profile_url = array(
		'profile'    => 'https://api.line.me/v2/profile',
		'friendship' => 'https://api.line.me/friendship/v1/status',
	);

	/**
	 * アクセストークンのヘッダー
	 *
	 * @param string $access_token アクセストークン.
	 */
	public static function get_access_token_header( string $access_token ) {
		return array( 'Authorization' => "Bearer $access_token" );
	}

	/**
	 * プロフィールの取得リクエスト
	 *
	 * @param string $access_token アクセストークン.
	 */
	public static function get_profile_request( string $access_token ) {
		return array(
			'url'     => self::$profile_url['profile'],
			'headers' => self::get_access_token_header( $access_token ),
		);
	}

	/**
	 * 友だちかどうかの取得リクエスト
	 *
	 * @param string $access_token アクセストークン.
	 */
	public static function get_friendship_request( string $access_token ) {
		return array(
			'url'     => self::$profile_url['friendship'],
			'headers' => self::get_access_token_header( $access_token ),
		);
	}

	/**
	 * アクセストークンからLINEアカウントを取得
	 *
	 * @param Access_Token_DTO $access_token 有効なアクセストークン.
	 * @throws InvalidArgumentException アクセストークンが無効な場合.
	 */
	public function get_line_account( Access_Token_DTO $access_token ): Line_Account_DTO {
		if ( ! $access_token->is_valid() ) {
			throw new InvalidArgumentException( 'アクセストークンが無効です。', Code::INVALID_ACCESS_TOKEN );
		}

		if ( $this->get_is_linked_official_account() ) {
			$props = $this->fetch_profile_and_friendship( $access_token );
			if ( ! isset( $props['friend_flag'] ) ) {
				$this->set_is_linked_official_account( false );
			}
		} else {
			$props = $this->fetch_profile( $access_token );
		}
		return new Line_Account_DTO( $props );
	}

	/**
	 * ユーザー情報を取得
	 *
	 * @param Access_Token_DTO $access_token アクセストークン.
	 * @throws RuntimeException ユーザー情報の取得に失敗した場合.
	 */
	private function fetch_profile( Access_Token_DTO $access_token ) {
		$token    = $access_token->get_access_token();
		$response = Utils::request( self::$profile_url['profile'], self::get_access_token_header( $token ) );
		return self::profile_response_to_array( $response );
	}

	/**
	 * ユーザー情報と友だちかどうかを取得
	 *
	 * @param Access_Token_DTO $access_token アクセストークン.
	 * @throws RuntimeException ユーザー情報の取得に失敗した場合.
	 */
	private function fetch_profile_and_friendship( Access_Token_DTO $access_token ) {
		$token    = $access_token->get_access_token();
		$requests = array(
			self::get_profile_request( $token ),
			self::get_friendship_request( $token ),
		);

		$responses = Utils::request_multiple( $requests );

		$profile_props    = self::profile_response_to_array( $responses[0] );
		$friendship_props = self::friendship_response_to_array( $responses[1] );

		if ( $friendship_props === null ) {
			return $profile_props;
		}

		return array_merge( $profile_props, $friendship_props );
	}

	/**
	 * LINE公式アカウントのリンク状況を取得し、更新する
	 *
	 * @param Access_Token_DTO $access_token アクセストークン.
	 * @throws InvalidArgumentException アクセストークンが無効な場合.
	 */
	public function update_linked_status( Access_Token_DTO $access_token ) {
		if ( ! $access_token->is_valid() ) {
			throw new InvalidArgumentException( 'アクセストークンが無効です。', Code::INVALID_ACCESS_TOKEN );
		}

		$token    = $access_token->get_access_token();
		$response = Utils::request( self::$profile_url['friendship'], self::get_access_token_header( $token ) );

		$result = self::friendship_response_to_array( $response );
		$this->set_is_linked_official_account( $result !== null );
	}

	/**
	 * プロフィールレスポンスを連想配列に変換
	 *
	 * @param Response $response レスポンス.
	 * @throws RuntimeException ユーザー情報の取得に失敗した場合.
	 */
	private static function profile_response_to_array( $response ) {
		if ( $response->status_code === 401 ) {
			throw new RuntimeException( 'アクセストークンが無効です。', Code::INVALID_ACCESS_TOKEN );
		}

		if ( $response->status_code !== 200 ) {
			throw new RuntimeException( 'ユーザー情報の取得に失敗しました。', Code::LOGIN_API_ERROR );
		}

		$body  = json_decode( $response->body, true );
		$props = Array_Key_Converter::camel_to_snake( $body );
		return $props;
	}

	/**
	 * 友だちかどうかのレスポンスを連想配列に変換
	 *
	 * @param Response $response レスポンス.
	 * @throws RuntimeException ユーザー情報の取得に失敗した場合.
	 */
	private static function friendship_response_to_array( $response ) {
		if ( $response->status_code === 401 ) {
			throw new RuntimeException( 'アクセストークンが無効です。', Code::INVALID_ACCESS_TOKEN );
		}

		if ( $response->status_code === 400 ) {
			return null;
		}

		if ( $response->status_code !== 200 ) {
			throw new RuntimeException( 'ユーザー情報の取得に失敗しました。', Code::LOGIN_API_ERROR );
		}

		$body  = json_decode( $response->body, true );
		$props = Array_Key_Converter::camel_to_snake( $body );
		return $props;
	}
}
