<?php
/**
 * 文字列を変換するクラス
 *
 * @package LClutch\Utils
 */

namespace LClutch\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 文字列を変換するクラス
 */
class String_Converter {

	/**
	 * 文字列をスネークケースからキャメルケースへ変換
	 *
	 * @param string $target 変換したい文字列.
	 */
	public static function snake_to_camel( string $target ): string {
		return lcfirst( str_replace( '_', '', ucwords( $target, '_' ) ) );
	}

	/**
	 * 文字列をキャメルケースからスネークケースへ変換
	 *
	 * @param string $target 変換したい文字列.
	 */
	public static function camel_to_snake( string $target ): string {
		return strtolower( preg_replace( '/(?<!^)[A-Z]/', '_$0', $target ) );
	}

	/**
	 * 空白区切りの文字列をキャメルケースへ変換
	 *
	 * @param string $target 変換したい文字列.
	 * @param bool   $first_upper 先頭を大文字にするかどうか.
	 */
	public static function space_to_camel( string $target, $first_upper = false ): string {
		$target = str_replace( ' ', '', ucwords( $target ) );
		if ( ! $first_upper ) {
			$target = lcfirst( $target );
		}
		return $target;
	}
}
