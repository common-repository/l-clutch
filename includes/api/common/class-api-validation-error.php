<?php
/**
 * APIバリデーションエラー
 *
 * @package LClutch\API
 */

namespace LClutch\API;

use Opis\JsonSchema\Errors\ErrorFormatter;
use Opis\JsonSchema\Errors\ValidationError;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * APIバリデーションエラー
 */
class API_Validation_Error extends API_Error {

	/**
	 * エラーフォーマッター
	 *
	 * @var ErrorFormatter
	 */
	private ErrorFormatter $formatter;

	/**
	 * コンストラクタ
	 *
	 * @param string $code エラーコード.
	 * @param string $message エラーメッセージ.
	 * @param mixed  $data エラーデータ.
	 */
	public function __construct( $code, $message, $data = null ) {
		parent::__construct( $code, $message, $data );

		$this->formatter = new ErrorFormatter();
	}

	/**
	 * レスポンスに変換
	 *
	 * @param mixed $error_data エラーデータ.
	 */
	public function to_response( $error_data = null ) {
		$data = $this->formatter->formatKeyed(
			$error_data ?? $this->get_error_data(),
			array( $this, 'error_data' ),
			array( $this, 'error_key' )
		);

		return parent::to_response( $data );
	}

	/**
	 * エラーデータ
	 *
	 * @param ValidationError $error エラー.
	 */
	public function error_data( $error ) {
		return array(
			'type'    => $error->keyword(),
			'message' => $this->formatter->formatErrorMessage( $error ),
		);
	}

	/**
	 * エラーキー
	 *
	 * @param ValidationError $error エラー.
	 */
	public function error_key( $error ) {
		return implode( '.', $error->data()->fullPath() );
	}
}
