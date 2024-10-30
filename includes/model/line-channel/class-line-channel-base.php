<?php
/**
 * LINEチャネルのベースクラス
 *
 * @package LClutch\Model\Line_Channel
 */

namespace LClutch\Model\Line_Channel;

use InvalidArgumentException;
use LClutch\Model\DTO\Channel_Setting_DTO;
use LClutch\Model\DTO\Channel_Status_DTO;
use LClutch\Model\Exception\Code;
use LClutch\Model\Exception\Validation_Exception;
use LClutch\LineApi\ChannelAccessToken\Api\ChannelAccessTokenApi;
use LClutch\LineApi\ChannelAccessToken\ApiException;
use LClutch\LineApi\ChannelAccessToken\Model\ErrorResponse;
use RuntimeException;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * LINEチャネルのベースクラス
 */
abstract class Line_Channel_Base {

	/** オプションのキー */
	protected const OPTION_KEYS = array(
		'client_id'     => 'l-clutch_line-channel-client-id',
		'client_secret' => 'l-clutch_line-channel-client-secret',
	);

	/** トランジェントのキー */
	protected const TRANSIENT_KEYS = array(
		'access_token' => 'l-clutch_line-channel-access-token',
	);

	/**
	 * クライアントID
	 *
	 * @var string
	 */
	protected ?string $client_id = null;

	/**
	 * クライアントシークレット
	 *
	 * @var string
	 */
	protected ?string $client_secret = null;

	/**
	 * アクセストークン
	 *
	 * @var string
	 */
	protected ?string $access_token = null;

	/**
	 * アクセストークンAPIクライアント
	 *
	 * @var ChannelAccessTokenApi
	 */
	protected ?ChannelAccessTokenApi $channel_access_token_api_client = null;

	/**
	 * アンインストール時の処理
	 */
	public static function uninstall() {
		foreach ( static::OPTION_KEYS as $key => $value ) {
			delete_option( $value );
		}
		foreach ( static::TRANSIENT_KEYS as $key => $value ) {
			delete_transient( $value );
		}
	}

	/**
	 * クライアントIDを取得
	 */
	public function get_client_id() {
		if ( $this->client_id !== null ) {
			return $this->client_id;
		}

		$client_id = get_option( static::OPTION_KEYS['client_id'] );
		if ( ! empty( $client_id ) ) {
			$this->client_id = $client_id;
		}
		return $this->client_id;
	}

	/**
	 * クライアントシークレットを取得
	 */
	protected function get_client_secret() {
		if ( $this->client_secret !== null ) {
			return $this->client_secret;
		}

		$client_secret = get_option( static::OPTION_KEYS['client_secret'] );
		if ( ! empty( $client_secret ) ) {
			$this->client_secret = $client_secret;
		}
		return $this->client_secret;
	}

	/**
	 * アクセストークンを取得
	 */
	protected function get_access_token() {
		if ( $this->access_token !== null ) {
			return $this->access_token;
		}

		$access_token = get_transient( static::TRANSIENT_KEYS['access_token'] );
		if ( ! empty( $access_token ) ) {
			$this->access_token = $access_token;
		}
		return $this->access_token;
	}

	/**
	 * アクセストークンAPIクライアントを取得
	 */
	private function get_channel_access_token_api_client(): ChannelAccessTokenApi {
		if ( ! isset( $this->channel_access_token_api_client ) ) {
			$default_config                        = \LClutch\LineApi\ChannelAccessToken\Configuration::getDefaultConfiguration();
			$this->channel_access_token_api_client = new ChannelAccessTokenApi( null, $default_config );
		}

		return $this->channel_access_token_api_client;
	}

	/**
	 * クライアントIDを設定
	 *
	 * @param string $client_id クライアントID.
	 */
	private function set_client_id( $client_id ) {
		if ( $client_id !== null ) {
			$updated = update_option( static::OPTION_KEYS['client_id'], $client_id );
			if ( $updated ) {
				$this->client_id = $client_id;
			}
		} else {
			delete_option( static::OPTION_KEYS['client_id'] );
			$this->client_id = null;
		}
	}

	/**
	 * クライアントシークレットを設定
	 *
	 * @param string $client_secret クライアントシークレット.
	 */
	private function set_client_secret( $client_secret ) {
		if ( $client_secret !== null ) {
			$updated = update_option( static::OPTION_KEYS['client_secret'], $client_secret );
			if ( $updated ) {
				$this->client_secret = $client_secret;
			}
		} else {
			delete_option( static::OPTION_KEYS['client_secret'] );
			$this->client_secret = null;
		}
	}

	/**
	 * アクセストークンを設定
	 *
	 * @param string $access_token アクセストークン.
	 * @param int    $expires_in   有効期限.
	 */
	protected function set_access_token( $access_token, $expires_in ) {
		if ( $access_token !== null ) {
			$updated = set_transient( static::TRANSIENT_KEYS['access_token'], $access_token, $expires_in );
			if ( $updated ) {
				$this->access_token = $access_token;
			}
		} else {
			delete_transient( static::TRANSIENT_KEYS['access_token'] );
			$this->access_token = null;
		}
	}

	/**
	 * チャンネルの認証情報が有効化どうか
	 *
	 * @return bool
	 * @throws InvalidArgumentException パラメータが不正な場合.
	 */
	public function is_valid() {
		$is_valid = $this->verify_access_token();

		if ( $is_valid ) {
			return true;
		} elseif ( $this->get_client_id() === null || $this->get_client_secret() === null ) {
			return false;
		}

		try {
			$this->issue_access_token();
			return true;
		} catch ( InvalidArgumentException $e ) {
			if ( $e->getCode() !== Code::INVALID_CHANNEL_SETTING ) {
				throw $e;
			}
			return false;
		}
	}

	/**
	 * チャネルの状態の取得
	 *
	 * @return Channel_Status_DTO
	 */
	public function get_status(): Channel_Status_DTO {
		return new Channel_Status_DTO(
			array(
				'is_valid'   => $this->is_valid(),
				'channel_id' => $this->get_client_id(),
			)
		);
	}

	/**
	 * アクセストークンをローカルで保持しているかどうか
	 */
	public function has_access_token() {
		return $this->get_access_token() !== null;
	}

	/**
	 * アクセストークンが有効かどうか
	 *
	 * @return bool
	 */
	public function verify_access_token() {
		$access_token = $this->get_access_token();
		if ( $access_token === null ) {
			return false;
		}

		$client = $this->get_channel_access_token_api_client();

		try {
			$response = $client->verifyChannelToken( $access_token );

			if ( $response->getClientId() === $this->get_client_id() ) {
				return true;
			} else {
				return false;
			}
		} catch ( InvalidArgumentException $e ) {
			return false;
		} catch ( ApiException $e ) {
			// TODO: エラー処理.
			return false;
		}
	}

	/**
	 * アクセストークンを発行
	 *
	 * @param ?Channel_Setting_DTO $setting チャネル設定DTO.
	 * @return void
	 * @throws InvalidArgumentException チャネルの設定が不正.
	 * @throws RuntimeException アクセストークンの発行に失敗.
	 */
	protected function issue_access_token( ?Channel_Setting_DTO $setting = null ) {
		if ( $setting === null ) {
			try {
				$setting = new Channel_Setting_DTO(
					array(
						'channel_id'     => $this->get_client_id(),
						'channel_secret' => $this->get_client_secret(),
					)
				);
			} catch ( Validation_Exception $e ) {
				throw new InvalidArgumentException(
					'チャンネルIDとチャンネルシークレットを確認して下さい。',
					Code::INVALID_CHANNEL_SETTING,
					$e
				);
			}
		}

		$grant_type = 'client_credentials';
		$client     = $this->get_channel_access_token_api_client();

		try {
			$response = $client->issueChannelToken( $grant_type, $setting->get_channel_id(), $setting->get_channel_secret() );

			if ( $response instanceof ErrorResponse ) {
				throw new InvalidArgumentException(
					'アクセストークンの発行に失敗しました。チャンネルIDとチャンネルシークレットを確認して下さい。',
					Code::INVALID_CHANNEL_SETTING
				);
			}

			$access_token = $response->getAccessToken();
			$expires_in   = $response->getExpiresIn();
			$this->set_access_token( $access_token, $expires_in );
			return;
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				case 400:
					throw new InvalidArgumentException(
						'チャンネルIDとチャンネルシークレットを確認して下さい。',
						Code::INVALID_CHANNEL_SETTING,
						$e
					);
				default:
					throw new RuntimeException( 'アクセストークンの発行に失敗しました。', Code::CHANNEL_ACCESS_TOKEN_API_ERROR, $e );
			}
		}
	}

	/**
	 * チャネルのIDとシークレットを更新
	 *
	 * @param Channel_Setting_DTO $setting チャネル設定DTO.
	 */
	public function update_channel( Channel_Setting_DTO $setting ) {
		// アクセストークンを発行.
		$this->issue_access_token( $setting );

		// チャネルのIDとシークレットを保存.
		$this->set_client_id( $setting->get_channel_id() );
		$this->set_client_secret( $setting->get_channel_secret() );
	}
}
