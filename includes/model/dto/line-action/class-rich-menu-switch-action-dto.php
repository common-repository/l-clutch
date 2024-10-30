<?php
/**
 * リッチメニュー切り替えアクション
 *
 * @package LClutch\Model\DTO\Line_Action
 */

namespace LClutch\Model\DTO\Line_Action;

use LClutch\Model\DTO\DTO_Base;
use LClutch\Model\DTO\OpenAPI_DTO_Trait;
use LClutch\LineApi\MessagingApi\Model\RichMenuSwitchAction;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * リッチメニュー切り替えアクション
 */
class Rich_Menu_Switch_Action_DTO extends DTO_Base {

	use OpenAPI_DTO_Trait;

	const SCHEMA_FILE = 'line-action/rich-menu-switch-action.json';

	/**
	 * アクションの種類を取得する
	 */
	public function get_type(): string {
		return 'richmenuswitch';
	}

	/**
	 * データを取得する
	 *
	 * @return string
	 */
	public function get_data() {
		return $this->get_container( 'data' ) ?? 'richmenu-switch-to-' . $this->get_rich_menu_alias_id();
	}

	/**
	 * リッチメニューエイリアスIDを取得する
	 *
	 * @return string
	 */
	public function get_rich_menu_alias_id() {
		return $this->get_container( 'rich_menu_alias_id' );
	}

	/**
	 * OpenAPIオブジェクトに変換する
	 */
	public function to_openapi() {
		$props         = $this->to_array();
		$props['data'] = $this->get_data();
		$action        = new RichMenuSwitchAction( $props );
		$action->setType( 'richmenuswitch' );
		return $action;
	}
}
