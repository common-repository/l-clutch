<?php
/**
 * メッセージアクション
 *
 * @package LClutch\Model\DTO\Line_Action
 */

namespace LClutch\Model\DTO\Line_Action;

use LClutch\Model\DTO\DTO_Base;
use LClutch\Model\DTO\OpenAPI_DTO_Trait;
use LClutch\LineApi\MessagingApi\Model\MessageAction;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * メッセージアクション
 */
class Message_Action_DTO extends DTO_Base {

	use OpenAPI_DTO_Trait;

	const SCHEMA_FILE = 'line-action/message-action.json';


	/**
	 * アクションの種類を取得する
	 */
	public function get_type(): string {
		return 'message';
	}

	/**
	 * テキストを取得する
	 */
	public function get_text() {
		return $this->get_container( 'text' );
	}

	/**
	 * OpenAPIオブジェクトに変換する
	 */
	public function to_openapi() {
		$action = new MessageAction( $this->to_array() );
		$action->setType( 'message' );
		return $action;
	}
}
