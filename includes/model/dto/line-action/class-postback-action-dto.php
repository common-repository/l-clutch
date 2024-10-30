<?php
/**
 * ポストバックアクション
 *
 * @package LClutch\Model\DTO\Line_Action
 */

namespace LClutch\Model\DTO\Line_Action;

use LClutch\Model\DTO\DTO_Base;
use LClutch\Model\DTO\OpenAPI_DTO_Trait;
use LClutch\LineApi\MessagingApi\Model\PostbackAction;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ポストバックアクション
 */
class Postback_Action_DTO extends DTO_Base {

	use OpenAPI_DTO_Trait;

	const SCHEMA_FILE = 'line-action/postback-action.json';

	/**
	 * アクションの種類を取得する
	 */
	public function get_type(): string {
		return 'postback';
	}

	/**
	 * データを取得する
	 *
	 * @return string
	 */
	public function get_data() {
		return $this->get_container( 'data' );
	}

	/**
	 * テキストを取得する
	 *
	 * @return ?string
	 */
	public function get_display_text() {
		return $this->get_container( 'display_text' );
	}

	/**
	 * 入力オプションを取得する
	 *
	 * @return ?string
	 */
	public function get_input_option() {
		return $this->get_container( 'input_option' );
	}

	/**
	 * 入力オプションを取得する
	 *
	 * @return ?string
	 */
	public function get_fill_in_text() {
		return $this->get_container( 'fill_in_text' );
	}

	/**
	 * OpenAPIオブジェクトに変換する
	 */
	public function to_openapi() {
		$action = new PostbackAction( $this->to_array() );
		$action->setType( 'postback' );
		return $action;
	}
}
