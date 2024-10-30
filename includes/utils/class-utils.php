<?php
/**
 * ユーティリティクラス
 *
 * @package LClutch
 */

namespace LClutch;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\Utils\Singleton_Trait;
use WpOrg\Requests\Requests;

/**
 * ユーティリティクラス
 */
class Utils {

	use Singleton_Trait;

	/**
	 * リダイレクトする
	 *
	 * @param string $url URL.
	 */
	public static function redirect( string $url ): void {
		self::get_instance()->private_redirect( $url );
	}

	/**
	 * リダイレクトする
	 *
	 * @param string $url URL.
	 */
	public function private_redirect( string $url ): void {
		wp_safe_redirect( $url );
		exit;
	}

	/**
	 * リクエストを送信する
	 *
	 * @param string     $url URL.
	 * @param array      $headers ヘッダー.
	 * @param array|null $data データ.
	 * @param string     $type タイプ.
	 * @param array      $options オプション.
	 */
	public static function request( string $url, array $headers = array(), $data = array(), string $type = Requests::GET, array $options = array() ) {
		$response = apply_filters( 'lclutch_pre_http_request', false, $url, $headers, $data, $type, $options );

		if ( $response ) {
			return $response;
		} else {
			return Requests::request( $url, $headers, $data, $type, $options );
		}
	}

	/**
	 * 複数のリクエストを送信する
	 *
	 * @param array $requests リクエスト.
	 */
	public static function request_multiple( array $requests ) {
		$responses = apply_filters( 'lclutch_pre_http_request_multiple', false, $requests );

		if ( $responses ) {
			return $responses;
		} else {
			return Requests::request_multiple( $requests );
		}
	}

	/**
	 * ランダムな文字列を生成
	 *
	 * @param int $length 長さ.
	 */
	public static function generate_random_string( int $length = 32 ): string {
		$bytes = random_bytes( $length );
		return bin2hex( $bytes );
	}

	/**
	 * ホームURLからの相対パスへ変換
	 *
	 * @param string $absolute_path 変換するパス.
	 */
	public static function convert_relative_path( string $absolute_path ): string {
		$home       = home_url();
		$parsed_url = wp_parse_url( $home );
		if ( isset( $parsed_url['path'] ) ) {
			$path          = $parsed_url['path'];
			$relative_path = preg_replace( "|^$path|", '', $absolute_path );
		} else {
			$relative_path = $absolute_path;
		}
		return $relative_path;
	}

	/**
	 * Webpackのassetを登録する
	 *
	 * @param string       $handle ハンドル.
	 * @param string|false $js_src JSのパス.
	 * @param string|false $css_src CSSのパス.
	 * @param array        $asset アセット情報.
	 * @param bool         $load ロードするかどうか.
	 */
	public static function register_asset( string $handle, $js_src = false, $css_src = false, $asset, bool $load = false ): void {
		wp_register_script( $handle, $js_src, $asset['dependencies'], $asset['version'], false );

		$lclutch_deps = array_filter(
			$asset['dependencies'],
			function ( $dep ) {
				return strpos( $dep, 'l-clutch' ) !== false;
			}
		);

		wp_register_style( $handle, $css_src, $lclutch_deps, $asset['version'] );

		if ( $load ) {
			wp_enqueue_script( $handle );
			wp_enqueue_style( $handle );
		}
	}
}
