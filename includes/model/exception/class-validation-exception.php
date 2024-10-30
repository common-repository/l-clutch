<?php
/**
 * バリデーションの例外
 *
 * @package LClutch\Model\Exception
 */

namespace LClutch\Model\Exception;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Exception;
use Opis\JsonSchema\Errors\ErrorFormatter;
use Opis\JsonSchema\Errors\ValidationError;

/**
 * バリデーションの例外
 */
class Validation_Exception extends Exception {

	/**
	 * エラーの配列
	 *
	 * @var ValidationError
	 */
	private $error;

	/**
	 * コンストラクタ
	 *
	 * @param ValidationError $error バリデーションエラー.
	 */
	public function __construct( $error ) {
		$this->error   = $error;
		$messages      = ( new ErrorFormatter() )->formatFlat( $error );
		$error_message = '';
		foreach ( $messages as $message ) {
			$error_message .= $message . PHP_EOL;
		}
		parent::__construct( $error_message );
	}

	/**
	 * エラーの配列のゲッター
	 *
	 * @return ValidationError
	 */
	public function get_error() {
		return $this->error;
	}
}
