<?php
/**
 * Messaging APIのトレイト
 *
 * @package LClutch\Model\Line_Channel\Messaging_Channel
 */

namespace LClutch\Model\Line_Channel\Messaging_Channel;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use InvalidArgumentException;
use LClutch\Model\Exception\Authorize_Exception;
use LClutch\LineApi\ChannelAccessToken\ApiException;
use LClutch\LineApi\MessagingApi\Api\MessagingApiApi as MessagingApi;
use LClutch\LineApi\MessagingApi\Api\MessagingApiBlobApi as MessagingBlobApi;

trait Messaging_API_Trait {

	/**
	 * Messaging APIクライアント
	 *
	 * @var MessagingApi
	 */
	protected ?MessagingApi $messaging_api_client = null;

	/**
	 * Messaging API Blobクライアント
	 *
	 * @var MessagingBlobApi
	 */
	protected ?MessagingBlobApi $messaging_blob_api_client = null;

	/**
	 * Messaging APIクライアントを取得
	 */
	protected function get_messaging_api_client(): MessagingApi {
		if ( ! isset( $this->messaging_api_client ) ) {
			$default_config = \LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration();
			$access_token   = $this->get_access_token();
			if ( $access_token !== null ) {
				$default_config->setAccessToken( $access_token );
			}
			$this->messaging_api_client = new MessagingApi( null, $default_config );
		}

		return $this->messaging_api_client;
	}

	/**
	 * Messaging API Blobクライアントを取得
	 */
	protected function get_messaging_blob_api_client(): MessagingBlobApi {
		if ( ! isset( $this->messaging_blob_api_client ) ) {
			$default_config = \LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration();
			$access_token   = $this->get_access_token();
			if ( $access_token !== null ) {
				$default_config->setAccessToken( $access_token );
			}
			$this->messaging_blob_api_client = new MessagingBlobApi( null, $default_config );
		}

		return $this->messaging_blob_api_client;
	}

	/**
	 * APIを呼び出す
	 *
	 * @param callable $callback コールバック.
	 * @param mixed    $client クライアント.
	 * @param bool     $retry リトライかどうか.
	 * @throws ApiException APIエラー.
	 * @throws Authorize_Exception チャネルの認証情報が無効.
	 * @throws InvalidArgumentException 引数例外.
	 */
	private function call_api( callable $callback, $client, bool $retry = false ) {
		if ( ! $this->has_access_token() ) {
			try {
				$this->issue_access_token();
			} catch ( InvalidArgumentException $e ) {
				if ( $e->getCode() !== 'invalid_channel_setting' ) {
					throw $e;
				}
				throw new Authorize_Exception( 'チャネルの認証情報が無効です。', Authorize_Exception::MESSAGING_CHANNEL );
			}
			$retry = true;
		}

		try {
			return call_user_func( $callback, $client );
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				case 401:
					if ( $retry ) {
						throw new Authorize_Exception( 'チャネルの認証情報が無効です。', Authorize_Exception::MESSAGING_CHANNEL );
					}
					$this->call_api( $callback, $client, $retry );
					break;
				default:
					throw $e;
			}
		}
	}

	/**
	 * Messaging APIを呼び出す
	 *
	 * @param callable $callback コールバック.
	 * @throws ApiException APIエラー.
	 * @throws Authorize_Exception チャネルの認証情報が無効.
	 */
	protected function call_messaging_api( callable $callback ) {
		$client = $this->get_messaging_api_client();
		return $this->call_api( $callback, $client );
	}

	/**
	 * Messaging API Blob APIを呼び出す
	 *
	 * @param callable $callback コールバック.
	 * @throws ApiException APIエラー.
	 * @throws Authorize_Exception チャネルの認証情報が無効.
	 */
	protected function call_messaging_blob_api( callable $callback ) {
		$client = $this->get_messaging_blob_api_client();
		return $this->call_api( $callback, $client );
	}
}
