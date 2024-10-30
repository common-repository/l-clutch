<?php
/**
 * リッチメニューのエリアの座標
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO\RichMenu;

use LClutch\Model\DTO\DTO_Base;
use LClutch\Model\DTO\OpenAPI_DTO_Trait;
use LClutch\LineApi\MessagingApi\Model\RichMenuBounds;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * リッチメニューのエリアの座標
 */
class RichMenu_Bounds_DTO extends DTO_Base {

	use OpenAPI_DTO_Trait;

	const SCHEMA_FILE = 'rich-menu/rich-menu-bounds.json';

	/**
	 * Xを取得する
	 */
	public function get_x() {
		return $this->get_container( 'x' );
	}

	/**
	 * Yを取得する
	 */
	public function get_y() {
		return $this->get_container( 'y' );
	}

	/**
	 * Widthを取得する
	 */
	public function get_width() {
		return $this->get_container( 'width' );
	}

	/**
	 * Heightを取得する
	 */
	public function get_height() {
		return $this->get_container( 'height' );
	}

	/**
	 * OpenAPIオブジェクトから変換する
	 *
	 * @param RichMenuBounds $obj OpenAPIオブジェクト.
	 */
	public static function from_openapi( $obj ) {
		return self::from_openapi_model( $obj );
	}

	/**
	 * OpenAPIオブジェクトに変換する
	 */
	public function to_openapi() {
		return new RichMenuBounds( $this->get_container() );
	}
}
