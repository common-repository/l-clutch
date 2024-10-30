<?php
/**
 * 画像のDTO
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO;

use SplFileObject;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 画像のDTO
 */
class Image_DTO extends DTO_Base implements DTO_Column_Interface {

	use Column_Base_Trait;

	const SCHEMA_FILE = 'image.json';

	/**
	 * IDのゲッター
	 *
	 * @return int
	 */
	public function get_id() {
		return $this->get_container( 'id' );
	}

	/**
	 * URLのゲッター
	 *
	 * @return string
	 */
	public function get_url() {
		return $this->get_container( 'url' );
	}

	/**
	 * サムネイルURLのゲッター
	 *
	 * @return string
	 */
	public function get_thumbnail_url() {
		return $this->get_container( 'thumbnail_url' );
	}

	/**
	 * 幅のゲッター
	 *
	 * @return int
	 */
	public function get_width() {
		return $this->get_container( 'width' );
	}

	/**
	 * 高さのゲッター
	 *
	 * @return int
	 */
	public function get_height() {
		return $this->get_container( 'height' );
	}

	/**
	 * ファイルタイプのゲッター
	 */
	public function get_type() {
		return get_post_mime_type( $this->get_id() );
	}

	/**
	 * ファイルパスのゲッター
	 */
	public function get_path() {
		return get_attached_file( $this->get_id() );
	}

	/**
	 * ファイルハッシュのゲッター
	 */
	public function get_hash() {
		return hash_file( 'sha256', $this->get_path() );
	}

	/**
	 * ファイルサイズ
	 *
	 * @return int
	 */
	public function get_file_size() {
		return $this->get_container( 'file_size' );
	}

	/**
	 * ファイルデータのゲッター
	 *
	 * @return SplFileObject|null
	 */
	public function get_file_data() {
		return new SplFileObject( $this->get_path() );
	}

	/**
	 * コンストラクタ
	 *
	 * @param array $args 引数.
	 * @throws \InvalidArgumentException 画像が見つからない場合.
	 */
	public function __construct( array $args ) {
		if ( ! isset( $args['id'] ) ) {
			throw new \InvalidArgumentException( 'Invalid Image Id.' );
		}

		$new_args = $this->get_image_props( (int) $args['id'] );
		parent::__construct( $new_args );
	}

	/**
	 * Imageを取得
	 *
	 * @param int $id ID.
	 * @throws \InvalidArgumentException 画像が見つからない場合.
	 */
	private static function get_image_props( $id ): array {
		$image     = wp_get_attachment_image_src( $id, 'full' );
		$thumbnail = wp_get_attachment_image_src( $id, 'medium' );
		if ( $image === false || $thumbnail === false ) {
			throw new \InvalidArgumentException( 'Image not found' );
		}

		$props = array(
			'id'            => $id,
			'url'           => $image[0],
			'width'         => $image[1],
			'height'        => $image[2],
			'thumbnail_url' => $thumbnail[0],
			'file_size'     => filesize( get_attached_file( $id ) ),
		);

		return $props;
	}

	/**
	 * データベースのカラムに変換
	 */
	public function to_column() {
		$array = array(
			'id' => $this->get_id(),
		);
		return wp_json_encode( $array );
	}
}
