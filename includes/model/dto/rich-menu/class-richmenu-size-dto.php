<?php
/**
 * リッチメニューのサイズ
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO\RichMenu;

use LClutch\Model\DTO\DTO_Base;
use LClutch\Model\DTO\OpenAPI_DTO_Trait;
use LClutch\Model\Exception\Validation_Exception;
use LClutch\LineApi\MessagingApi\Model\RichMenuSize;
use LClutch\Utils\Validator;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * リッチメニューのエリアの座標
 */
class RichMenu_Size_DTO extends DTO_Base {

	use OpenAPI_DTO_Trait;

	const SCHEMA_FILE = 'rich-menu/rich-menu-size.json';

	/**
	 * バリデーション
	 *
	 * @throws Validation_Exception バリデーションエラー.
	 */
	public function validate() {
		parent::validate();

		$width  = $this->get_width();
		$height = $this->get_height();

		if ( ( $width / $height ) < 1.45 ) {
			throw new Validation_Exception(
				Validator::create_custom_error( self::SCHEMA_FILE, 'width', 'リッチメニューのサイズは、幅と高さの比が1.45以上である必要があります。' )
			);
		}
	}

	/**
	 * Widthを取得する
	 *
	 * @return int
	 */
	public function get_width() {
		return $this->get_container( 'width' );
	}

	/**
	 * Heightを取得する
	 *
	 * @return int
	 */
	public function get_height() {
		return $this->get_container( 'height' );
	}

	/**
	 * OpenAPIオブジェクトから変換する
	 *
	 * @param RichMenuSize $obj OpenAPIオブジェクト.
	 */
	public static function from_openapi( $obj ) {
		return self::from_openapi_model( $obj );
	}

	/**
	 * OpenAPIオブジェクトに変換する
	 */
	public function to_openapi() {
		return new RichMenuSize( $this->get_container() );
	}
}
