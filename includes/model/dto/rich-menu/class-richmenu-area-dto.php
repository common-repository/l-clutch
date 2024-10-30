<?php
/**
 * リッチメニューのエリアのDTO
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO\RichMenu;

use LClutch\Model\DTO\DTO_Base;
use LClutch\Model\DTO\OpenAPI_DTO_Trait;
use LClutch\LineApi\MessagingApi\Model\RichMenuArea;
use LClutch\Model\DTO\Line_Action\Line_Action_DTO_Base;
use LClutch\LineApi\MessagingApi\Model\Action;
use LClutch\LineApi\MessagingApi\Model\RichMenuBounds;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * リッチメニューのエリアのDTO
 */
class RichMenu_Area_DTO extends DTO_Base {

	use OpenAPI_DTO_Trait;

	const SCHEMA_FILE = 'rich-menu/rich-menu-area-dto.json';

	/**
	 * Boundsを取得する
	 *
	 * @return RichMenu_Bounds_DTO
	 */
	public function get_bounds() {
		return $this->get_container( 'bounds' );
	}

	/**
	 * Actionを取得する
	 *
	 * @return Line_Action_DTO_Base
	 */
	public function get_action() {
		return $this->get_container( 'action' );
	}

	/**
	 * コンストラクタ
	 *
	 * @param array $args プロパティの配列.
	 * @throws \InvalidArgumentException 無効な引数の場合.
	 */
	public function __construct( array $args ) {
		$new_args = $args;
		if ( is_array( $args['bounds'] ) ) {
			$new_args['bounds'] = new RichMenu_Bounds_DTO( $args['bounds'] );
		} elseif ( $args['bounds'] instanceof RichMenuBounds ) {
			$new_args['bounds'] = RichMenu_Bounds_DTO::from_openapi( $args['bounds'] );
		}

		if ( is_array( $args['action'] ) ) {
			$new_args['action'] = Line_Action_DTO_Base::build( $args['action'] );
		} elseif ( $args['action'] instanceof Action ) {
			$new_args['action'] = Line_Action_DTO_Base::build_from_openapi( $args['action'] );
		}

		parent::__construct( $new_args );
	}

	/**
	 * プロパティが同じかどうか
	 *
	 * @param RichMenu_Area_DTO $target 比較対象.
	 * @param bool              $check_all 全てのプロパティをチェックするかどうか.
	 */
	public function equals( $target, $check_all = false ): bool {
		return $this->get_bounds()->equals( $target->get_bounds(), $check_all ) && $this->get_action()->equals( $target->get_action(), $check_all );
	}

	/**
	 * 連想配列に変換する
	 */
	public function to_array(): array {
		return array(
			'bounds' => $this->get_bounds()->to_array(),
			'action' => $this->get_action()->to_array(),
		);
	}

	/**
	 * OpenAPIオブジェクトから変換する
	 *
	 * @param RichMenuArea $obj OpenAPIオブジェクト.
	 */
	public static function from_openapi( $obj ) {
		return self::from_openapi_model( $obj );
	}

	/**
	 * OpenAPIオブジェクトに変換する
	 */
	public function to_openapi() {
		return new RichMenuArea(
			array(
				'bounds' => $this->get_bounds()->to_openapi(),
				'action' => $this->get_action()->to_openapi(),
			)
		);
	}
}
