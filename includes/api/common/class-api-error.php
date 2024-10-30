<?php
/**
 * APIエラー
 *
 * @package LClutch\API
 */

namespace LClutch\API;

use WP_Error;
use WP_REST_Response;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * エラー
 */
class API_Error extends WP_Error {

	const CODE_INVALID_PARAMETER                = 'invalid_parameter';
	const CODE_INVALID_BODY                     = 'invalid_body';
	const CODE_NOT_PREPARED                     = 'not_prepared';
	const CODE_MESSAGING_CHANNEL_NOT_AUTHORIZED = 'messaging_channel_not_authorized';
	const CODE_UNKNOWN_ERROR                    = 'unknown_error';

	const STATUS_CODE_MAP = array(
		self::CODE_INVALID_PARAMETER                => 400,
		self::CODE_INVALID_BODY                     => 400,
		self::CODE_NOT_PREPARED                     => 400,
		self::CODE_MESSAGING_CHANNEL_NOT_AUTHORIZED => 400,
		self::CODE_UNKNOWN_ERROR                    => 500,
	);

	/**
	 * レスポンスに変換
	 *
	 * @param mixed $error_data エラーデータ.
	 */
	public function to_response( $error_data = null ) {
		$data = array(
			'code'    => $this->get_error_code(),
			'message' => $this->get_error_message(),
			'data'    => $error_data ?? $this->get_error_data(),
		);

		$status = self::STATUS_CODE_MAP[ $this->get_error_code() ] ?? 500;

		return new WP_REST_Response( $data, $status );
	}
}
