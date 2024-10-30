<?php
/**
 * リッチメニューのDTO
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO\RichMenu;

use LClutch\Model\DTO\OpenAPI_DTO_Trait;
use LClutch\Model\DTO\Image_DTO;
use LClutch\Model\DTO\Row_Base;
use LClutch\LineApi\MessagingApi\Model\RichMenuArea;
use LClutch\LineApi\MessagingApi\Model\RichMenuRequest;
use LClutch\LineApi\MessagingApi\Model\RichMenuResponse;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * リッチメニューのDTO
 */
class RichMenu_DTO extends Row_Base {

	use OpenAPI_DTO_Trait;

	const SCHEMA_FILE = 'rich-menu/rich-menu-dto.json';

	/**
	 * リッチメニューIDのゲッター
	 *
	 * @return ?string
	 */
	public function get_rich_menu_id() {
		return $this->get_container( 'rich_menu_id' );
	}

	/**
	 * リッチメニューエイリアスIDのゲッター
	 *
	 * @return ?string
	 */
	public function get_rich_menu_alias_id() {
		return $this->get_container( 'rich_menu_alias_id' );
	}

	/**
	 * リッチメニューをデフォルトで表示するかどうかのゲッター
	 *
	 * @return ?bool
	 */
	public function get_selected() {
		return $this->get_container( 'selected' );
	}

	/**
	 * リッチメニューの名前のゲッター
	 *
	 * @return string
	 */
	public function get_name() {
		return $this->get_container( 'name' );
	}

	/**
	 * チャットバーのテキストのゲッター
	 *
	 * @return ?string
	 */
	public function get_chat_bar_text() {
		return $this->get_container( 'chat_bar_text' );
	}

	/**
	 * リッチメニューのサイズ
	 *
	 * @return ?RichMenu_Size_DTO
	 */
	public function get_size() {
		$background = $this->get_background();
		if ( $background === null ) {
			return null;
		}

		return new RichMenu_Size_DTO(
			array(
				'width'  => $background->get_width(),
				'height' => $background->get_height(),
			)
		);
	}

	/**
	 * リッチメニューエリアのゲッター
	 *
	 * @return RichMenu_Area_DTO[]
	 */
	public function get_areas() {
		return $this->get_container( 'areas' );
	}

	/**
	 * リッチメニューの背景画像のゲッター
	 *
	 * @return Image_DTO
	 */
	public function get_background() {
		return $this->get_container( 'background' );
	}

	/**
	 * リッチメニューの背景画像のハッシュのゲッター
	 */
	public function get_uploaded_background_hash() {
		return $this->get_container( 'uploaded_background_hash' );
	}

	/**
	 * リッチメニューの背景画像のハッシュをセット
	 */
	public function with_uploaded_background_hash() {
		$args = array(
			'background'               => $this->get_background(),
			'uploaded_background_hash' => $this->get_background()->get_hash(),
		);
		return $this->with( $args );
	}

	/**
	 * リッチメニューエリアの配列を変換する
	 *
	 * @param RichMenu_Area_DTO[]|RichMenuArea[]|array[]|string $areas リッチメニューエリア.
	 */
	private function convert_areas_to_dto( $areas ) {
		if ( is_string( $areas ) ) {
			$areas = json_decode( $areas, true );
		}

		return array_map(
			function ( $area ) {
				if ( $area instanceof RichMenu_Area_DTO ) {
					return $area;
				} elseif ( $area instanceof RichMenuArea ) {
					return RichMenu_Area_DTO::from_openapi( $area );
				} else {
					return new RichMenu_Area_DTO( $area );
				}
			},
			$areas
		);
	}

	/**
	 * 画像をDTOに変換する
	 *
	 * @param Image_DTO|array $background リッチメニューの背景画像.
	 * @throws \InvalidArgumentException 引数が不正な場合.
	 */
	private function convert_background_to_dto( $background ) {
		if ( is_string( $background ) ) {
			$background = Image_DTO::from_column( $background );
		} elseif ( is_array( $background ) ) {
			$background = new Image_DTO( $background );
		}
		if ( ! $background instanceof Image_DTO ) {
			throw new \InvalidArgumentException( 'background must be json, array or Image_DTO' );
		}
		return $background;
	}

	/**
	 * コンストラクタ
	 *
	 * @param array $args プロパティの配列.
	 * @throws \InvalidArgumentException 引数が不正な場合.
	 */
	public function __construct( array $args = array() ) {
		$new_args          = $args;
		$new_args['areas'] = $this->convert_areas_to_dto( $args['areas'] );
		if ( isset( $args['background'] ) ) {
			$new_args['background'] = $this->convert_background_to_dto( $args['background'] );
		}

		parent::__construct( $new_args );
	}

	/**
	 * リッチメニューエイリアスIDを生成
	 *
	 * @return string
	 */
	public function generate_rich_menu_alias_id(): string {
		return 'l-clutch_' . $this->get_id();
	}


	/**
	 * プロパティに変化があるかどうか
	 *
	 * @param RichMenu_DTO $target 比較対象.
	 */
	public function has_changed( RichMenu_DTO $target ): bool {
		$left  = $this->to_array();
		$right = $target->to_array();

		unset( $left['id'] );
		unset( $right['id'] );
		unset( $left['rich_menu_alias_id'] );
		unset( $right['rich_menu_alias_id'] );
		unset( $left['created_at'] );
		unset( $right['created_at'] );
		unset( $left['updated_at'] );
		unset( $right['updated_at'] );

		return $left != $right; // phpcs:ignore
	}

	/**
	 * 画像に変更があるかどうか
	 */
	public function has_changed_background(): bool {
		if ( ! is_null( $this->get_background() ) ) {
			return $this->get_background()->get_hash() !== $this->get_uploaded_background_hash();
		} else {
			return ! is_null( $this->get_uploaded_background_hash() );
		}
	}

	/**
	 * 連想配列に変換
	 */
	public function to_array(): array {
		$array = $this->to_row_base_array();

		if ( $this->get_size() ) {
			$array['size'] = $this->get_size()->to_array();
		}

		$array['areas'] = array_map(
			function ( RichMenu_Area_DTO $area ) {
				return $area->to_array();
			},
			$this->get_areas()
		);

		if ( $this->get_background() ) {
			$array['background'] = $this->get_background()->to_array();
		}

		return $array;
	}

	/**
	 * データベースの行に変換
	 *
	 * @return array
	 */
	public function to_row(): array {
		$row = $this->to_row_base();

		$row['areas'] = wp_json_encode(
			array_map(
				function ( RichMenu_Area_DTO $area ) {
					return $area->to_array();
				},
				$this->get_areas()
			)
		);

		if ( array_key_exists( 'size', $row ) ) {
			unset( $row['size'] );
		}

		if ( isset( $row['background'] ) ) {
			$row['background'] = $this->get_background()->to_column();
		}

		return $row;
	}

	/**
	 * データベースの行から作成
	 *
	 * @param array $row データベースの行.
	 * @return RichMenu_DTO
	 */
	public static function from_row( array $row ): RichMenu_DTO {
		$new_row             = $row;
		$new_row['selected'] = (bool) $row['selected'];

		$new_row['areas'] = array_map(
			function ( $area ) {
				return new RichMenu_Area_DTO( $area );
			},
			json_decode( $row['areas'], true )
		);

		if ( isset( $row['background'] ) ) {
			$new_row['background'] = Image_DTO::from_column( $row['background'] );
		}

		return parent::from_row( $new_row );
	}

	/**
	 * MessagingAPIのレスポンスから作成
	 *
	 * @param RichMenuResponse $response レスポンス.
	 * @return RichMenu_DTO
	 */
	public static function from_openapi( $response ): RichMenu_DTO {
		$getters   = $response->getters();
		$container = array(
			'status' => 'publish',
		);
		foreach ( $getters as $key => $getter ) {
			switch ( $key ) {
				case 'size':
					$container[ $key ] = RichMenu_Size_DTO::from_openapi( $response->$getter() );
					break;
				case 'areas':
					$container[ $key ] = array_map(
						function ( RichMenuArea $area ) {
							return RichMenu_Area_DTO::from_openapi( $area );
						},
						$response->$getter()
					);
					break;
				default:
					$container[ $key ] = $response->$getter();
			}
		}

		return new self( $container );
	}

	/**
	 * MessagingAPIのレスポンスに変換
	 *
	 * @return RichMenuRequest
	 */
	public function to_openapi() {
		$container         = $this->get_container();
		$container['size'] = $this->get_size()->to_openapi();

		if ( isset( $container['areas'] ) ) {
			$container['areas'] = array_map(
				function ( RichMenu_Area_DTO $area ) {
					return $area->to_openapi();
				},
				$container['areas']
			);
		}

		return new RichMenuRequest( $container );
	}
}
