<?php
/**
 * OpenAPIに変換するDTOのトレイト
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO;

use LClutch\LineApi\ChannelAccessToken\Model\ModelInterface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait OpenAPI_DTO_Trait {

	/**
	 * OpenAPIオブジェクトから変換する
	 *
	 * @param ModelInterface $obj OpenAPIオブジェクト.
	 */
	public static function from_openapi( $obj ) {
		return self::from_openapi_model( $obj );
	}

	/**
	 * OpenAPIオブジェクトから変換する
	 *
	 * @param ModelInterface $obj OpenAPIオブジェクト.
	 */
	public static function from_openapi_model( $obj ) {
		$getters = $obj->getters();
		$args    = array();
		foreach ( $getters as $key => $getter ) {
			$args[ $key ] = $obj->$getter();
		}
		return new static( $args );
	}

	/**
	 * OpenAPIオブジェクトに変換する
	 *
	 * @return ModelInterface
	 */
	abstract public function to_openapi();
}
