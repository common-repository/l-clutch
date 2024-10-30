<?php
/**
 * 配列のキーを変換するクラス
 *
 * @package LClutch\Utils
 */

namespace LClutch\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Array_Key_Converter
 */
class Array_Key_Converter {

	/**
	 * 連想配列のキーをスネークケースからキャメルケースへ変換
	 *
	 * @param array $target_array 変換したい連想配列.
	 * @return array
	 */
	public static function snake_to_camel( array $target_array ): array {
		$converted_array = array();
		foreach ( $target_array as $key => $value ) {
			$key                     = String_Converter::snake_to_camel( $key );
			$converted_array[ $key ] = $value;
		}
		return $converted_array;
	}

	/**
	 * 連想配列のキーをキャメルケースからスネークケースへ変換
	 *
	 * @param array $target_array 変換したい連想配列.
	 * @return array
	 */
	public static function camel_to_snake( array $target_array ): array {
		$converted_array = array();
		foreach ( $target_array as $key => $value ) {
			$key                     = String_Converter::camel_to_snake( $key );
			$converted_array[ $key ] = $value;
		}
		return $converted_array;
	}

	/**
	 * 連想配列のキーをスネークケースからキャメルケースへ変換(再帰)
	 *
	 * @param array $target_array 変換したい連想配列.
	 */
	public static function snake_to_camel_recursive( array $target_array ) {
		$result = array();
		foreach ( $target_array as $key => $value ) {
			if ( is_array( $value ) ) {
				$value = self::snake_to_camel_recursive( $value );
			}
			$key            = String_Converter::snake_to_camel( $key );
			$result[ $key ] = $value;
		}
		return $result;
	}

	/**
	 * 連想配列のキーをキャメルケースからスネークケースへ変換(再帰)
	 *
	 * @param array $target_array 変換したい連想配列.
	 */
	public static function camel_to_snake_recursive( array $target_array ) {
		$result = array();
		foreach ( $target_array as $key => $value ) {
			if ( is_array( $value ) ) {
				$value = self::camel_to_snake_recursive( $value );
			}
			$key            = String_Converter::camel_to_snake( $key );
			$result[ $key ] = $value;
		}
		return $result;
	}
}
