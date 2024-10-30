<?php
/**
 * OpenAPIに変換可能なDTOのインターフェース
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO;

use LClutch\LineApi\ChannelAccessToken\Model\ModelInterface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

interface DTO_OpenAPI_Interface extends DTO_Interface {

	/**
	 * OpenAPIオブジェクトから変換する
	 *
	 * @param ModelInterface $obj OpenAPIオブジェクト.
	 */
	public static function from_openapi( $obj );

	/**
	 * OpenAPIオブジェクトに変換する
	 *
	 * @return ModelInterface
	 */
	public function to_openapi(): ModelInterface;
}
