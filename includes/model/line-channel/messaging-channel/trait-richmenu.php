<?php
/**
 * リッチメニュー関連の処理
 *
 * @package LClutch\Model\Line_Channel\Messaging_Channel
 */

namespace LClutch\Model\Line_Channel\Messaging_Channel;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use InvalidArgumentException;
use RuntimeException;
use SplFileObject;
use LClutch\Model\DTO\RichMenu\RichMenu_DTO;
use LClutch\Model\Exception\Code;
use LClutch\LineApi\MessagingApi\ApiException;
use LClutch\LineApi\MessagingApi\Model\CreateRichMenuAliasRequest;
use LClutch\LineApi\MessagingApi\Model\RichMenuAliasListResponse;
use LClutch\LineApi\MessagingApi\Model\RichMenuAliasResponse;
use LClutch\LineApi\MessagingApi\Model\UpdateRichMenuAliasRequest;
use LClutch\LineApi\MessagingApi\Api\MessagingApiApi as MessagingApi;
use LClutch\LineApi\MessagingApi\Api\MessagingApiBlobApi as MessagingBlobApi;

trait RichMenu_Trait {

	use Messaging_API_Trait;

	/**
	 * リッチメニューを取得
	 *
	 * @param string $rich_menu_id リッチメニューID.
	 * @return RichMenu_DTO $rich_menu
	 * @throws RuntimeException リッチメニュー取得失敗例外.
	 */
	public function get_richmenu( string $rich_menu_id ) {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) use ( $rich_menu_id ) {
					$response = $client->getRichMenu( $rich_menu_id );
					$dto      = RichMenu_DTO::from_openapi( $response );
					return $dto;
				}
			);
		} catch ( InvalidArgumentException $e ) {
			return null;
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				case 404:
					return null;
				default:
					throw new RuntimeException( 'リッチメニューの取得に失敗しました。', Code::MESSAGING_API_ERROR, $e );
			}
		}
	}

	/**
	 * リッチメニューを全件取得
	 *
	 * @return RichMenu_DTO[] $rich_menus
	 * @throws RuntimeException リッチメニュー取得失敗例外.
	 */
	public function get_all_richmenu() {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) {
					$response   = $client->getRichMenuList();
					$rich_menus = array();
					foreach ( $response->getRichmenus() as $rich_menu ) {
						$rich_menus[] = RichMenu_DTO::from_openapi( $rich_menu );
					}
					return $rich_menus;
				}
			);
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				default:
					throw new RuntimeException( 'リッチメニューの取得に失敗しました。', Code::MESSAGING_API_ERROR, $e );
			}
		}
	}

	/**
	 * リッチメニューオブジェクトの検証
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 * @return true
	 * @throws InvalidArgumentException リクエスト例外.
	 * @throws RuntimeException リッチメニューオブジェクトの検証失敗例外.
	 */
	public function validate_richmenu( RichMenu_DTO $dto ) {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) use ( $dto ) {
					$client->validateRichMenuObject( $dto->to_openapi() );
					return true;
				}
			);
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				case 400:
					throw new InvalidArgumentException( 'リッチメニューオブジェクトの形式が正しくありません。', Code::INVALID_RICH_MENU, $e );
				default:
					throw new RuntimeException( 'リッチメニューオブジェクトの検証に失敗しました。', Code::MESSAGING_API_ERROR, $e );
			}
		}
	}

	/**
	 * リッチメニューを作成
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 * @throws InvalidArgumentException リクエスト例外.
	 * @throws RuntimeException リッチメニュー作成失敗例外.
	 */
	public function create_richmenu( RichMenu_DTO $dto ): RichMenu_DTO {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) use ( $dto ) {
					$response = $client->createRichMenu( $dto->to_openapi() );
					return $dto->with(
						array(
							'rich_menu_id'             => $response->getRichMenuId(),
							'uploaded_background_hash' => null,
						)
					);
				}
			);
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				case 400:
					throw new InvalidArgumentException( 'リッチメニューの形式が正しくありません。', Code::INVALID_RICH_MENU, $e );
				default:
					throw new RuntimeException( 'リッチメニューの作成に失敗しました。', Code::MESSAGING_API_ERROR, $e );
			}
		}
	}

	/**
	 * リッチメニューに画像をアップロード
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 * @throws InvalidArgumentException 画像が不正な場合.
	 * @throws RuntimeException リッチメニュー画像アップロード失敗例外.
	 */
	public function upload_richmenu_image( RichMenu_DTO $dto ): RichMenu_DTO {
		try {
			return $this->call_messaging_blob_api(
				function ( MessagingBlobApi $client ) use ( $dto ) {
					// TODO: 実APIで正しく動作するか確認.
					$client->setRichMenuImage( $dto->get_rich_menu_id(), $dto->get_background()->get_file_data(), null, array(), $dto->get_background()->get_type() );
					return $dto->with_uploaded_background_hash();
				}
			);
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				case 400:
					throw new InvalidArgumentException( 'リッチメニューの画像の形式が正しくありません。', Code::INVALID_IMAGE, $e );
				case 413:
					throw new InvalidArgumentException( 'リッチメニューの画像のサイズが大きすぎます。', Code::INVALID_IMAGE, $e );
				default:
					throw new RuntimeException( 'リッチメニューの画像のアップロードに失敗しました。', Code::MESSAGING_API_BLOB_ERROR, $e );
			}
		}
	}

	/**
	 * リッチメニューの画像をダウンロード
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 * @return SplFileObject ダウンロードした画像
	 * @throws RuntimeException リッチメニュー画像ダウンロード失敗例外.
	 */
	public function download_richmenu_image( RichMenu_DTO $dto ): SplFileObject {
		try {
			return $this->call_messaging_blob_api(
				function ( MessagingBlobApi $client ) use ( $dto ) {
					$response = $client->getRichMenuImage( $dto->get_rich_menu_id() );
					return $response;
				}
			);
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				default:
					throw new RuntimeException( 'リッチメニューの画像のダウンロードに失敗しました。', Code::MESSAGING_API_BLOB_ERROR, $e );
			}
		}
	}

	/**
	 * リッチメニューを削除
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 */
	public function delete_richmenu( RichMenu_DTO $dto ): RichMenu_DTO {
		$this->delete_richmenu_by_id( $dto->get_rich_menu_id() );

		return $dto->with( array( 'rich_menu_id' => null ) );
	}

	/**
	 * リッチメニューを削除(ID指定)
	 *
	 * @param string $rich_menu_id リッチメニューID.
	 * @return true
	 * @throws RuntimeException リッチメニュー削除失敗例外.
	 */
	public function delete_richmenu_by_id( string $rich_menu_id ) {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) use ( $rich_menu_id ) {
					$client->deleteRichMenu( $rich_menu_id );
					return true;
				}
			);
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				case 400:
				case 404:
					// 存在しない場合はエラーを無視.
					return true;
				default:
					throw new RuntimeException( 'リッチメニューの削除に失敗しました。', Code::MESSAGING_API_ERROR, $e );
			}
		}
	}

	/**
	 * リッチメニューエイリアスを削除
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 * @throws RuntimeException リッチメニューエイリアス削除失敗例外.
	 */
	public function delete_richmenu_alias( RichMenu_DTO $dto ): RichMenu_DTO {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) use ( $dto ) {
					$client->deleteRichMenuAlias( $dto->get_rich_menu_alias_id() );
					return $dto->with( array( 'rich_menu_alias_id' => null ) );
				}
			);
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				case 400:
				case 404:
					// 存在しない場合はエラーを無視.
					return $dto->with( array( 'rich_menu_alias_id' => null ) );
				default:
					throw new RuntimeException( 'リッチメニューエイリアスの削除に失敗しました。', Code::MESSAGING_API_ERROR, $e );
			}
		}
	}

	/**
	 * デフォルトのリッチメニューを設定
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 * @return bool
	 * @throws RuntimeException デフォルトのリッチメニュー設定失敗例外.
	 */
	public function set_default_richmenu( $dto ) {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) use ( $dto ) {
					$client->setDefaultRichMenu( $dto->get_rich_menu_id() );
					return true;
				}
			);
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				default:
					throw new RuntimeException( 'デフォルトのリッチメニューの設定に失敗しました。', Code::MESSAGING_API_ERROR, $e );
			}
		}
	}

	/**
	 * リッチメニューをユーザーに紐付け
	 *
	 * @param string $rich_menu_id リッチメニューID.
	 * @param string $user_id ユーザーID.
	 * @return true
	 * @throws InvalidArgumentException リクエスト例外.
	 * @throws RuntimeException リッチメニュー紐付け失敗例外.
	 */
	public function link_richmenu_to_user( string $rich_menu_id, string $user_id ) {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) use ( $rich_menu_id, $user_id ) {
					$client->linkRichMenuIdToUser( $user_id, $rich_menu_id );
					return true;
				}
			);
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				case 400:
					throw new InvalidArgumentException( 'リッチメニューのユーザーへの紐付けのリクエストが不正です。', Code::UNKNOWN_ERROR, $e );
				case 404:
					throw new InvalidArgumentException( 'リッチメニューもしくはユーザーが見つかりません。', Code::NOT_FOUND, $e );
				default:
					throw new RuntimeException( 'リッチメニューのユーザーへの紐付けに失敗しました。', Code::MESSAGING_API_ERROR, $e );
			}
		}
	}

	/**
	 * エイリアスを取得
	 *
	 * @param string $alias_id エイリアスID.
	 * @return RichMenuAliasResponse
	 * @throws RuntimeException リッチメニューエイリアス取得失敗例外.
	 */
	public function get_richmenu_alias( $alias_id ): RichMenuAliasResponse {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) use ( $alias_id ) {
					$response = $client->getRichMenuAlias( $alias_id );
					return $response;
				}
			);
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				case 404:
					return null;
				default:
					throw new RuntimeException( 'リッチメニューエイリアスの取得に失敗しました。', Code::MESSAGING_API_ERROR, $e );
			}
		}
	}

	/**
	 * エイリアスを全件取得
	 *
	 * @return RichMenuAliasListResponse
	 * @throws RuntimeException リッチメニューエイリアス取得失敗例外.
	 */
	public function get_all_richmenu_aliases(): RichMenuAliasListResponse {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) {
					$response = $client->getRichMenuAliasList();
					return $response;
				}
			);
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				default:
					throw new RuntimeException( 'リッチメニューエイリアスの取得に失敗しました。', Code::MESSAGING_API_ERROR, $e );
			}
		}
	}

	/**
	 * エイリアスを作成
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 * @throws InvalidArgumentException エイリアスIDが重複している場合.
	 * @throws RuntimeException リッチメニューエイリアス作成失敗例外.
	 */
	public function create_richmenu_alias( RichMenu_DTO $dto ): RichMenu_DTO {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) use ( $dto ) {
					$rich_menu_alias_id = $dto->generate_rich_menu_alias_id();
					$request            = new CreateRichMenuAliasRequest(
						array(
							'rich_menu_alias_id' => $rich_menu_alias_id,
							'rich_menu_id'       => $dto->get_rich_menu_id(),
						)
					);
					$client->createRichMenuAlias( $request );
					return $dto->with( array( 'rich_menu_alias_id' => $rich_menu_alias_id ) );
				}
			);
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				case 400:
					$response = json_decode( $e->getResponseBody(), true );
					if ( $response !== null && array_key_exists( 'message', $response ) && $response['message'] === 'conflict richmenu alias id' ) {
						throw new InvalidArgumentException( 'リッチメニューエイリアスIDが重複しています。', Code::CONFLICT_ID, $e );
					}
					throw new InvalidArgumentException( 'リッチメニューエイリアスの形式が正しくありません。', Code::UNKNOWN_ERROR, $e );
				default:
					throw new RuntimeException( 'リッチメニューエイリアスの作成に失敗しました。', Code::MESSAGING_API_ERROR, $e );
			}
		}
	}

	/**
	 * エイリアスを更新
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 * @throws InvalidArgumentException エイリアスIDが見つからない場合.
	 * @throws RuntimeException リッチメニューエイリアス更新失敗例外.
	 */
	public function update_richmenu_alias( RichMenu_DTO $dto ): RichMenu_DTO {
		try {
			return $this->call_messaging_api(
				function ( MessagingApi $client ) use ( $dto ) {
					$rich_menu_alias_id = $dto->get_rich_menu_alias_id();
					if ( $rich_menu_alias_id === null ) {
						$generated_rich_menu_alias_id = $dto->generate_rich_menu_alias_id();
					}

					$request = new UpdateRichMenuAliasRequest( array( 'rich_menu_id' => $dto->get_rich_menu_id() ) );
					$client->updateRichMenuAlias( $rich_menu_alias_id ?? $generated_rich_menu_alias_id, $request );
					if ( isset( $generated_rich_menu_alias_id ) ) {
						$dto = $dto->with( array( 'rich_menu_alias_id' => $generated_rich_menu_alias_id ) );
					}
					return $dto;
				}
			);
		} catch ( ApiException $e ) {
			switch ( $e->getCode() ) {
				case 400:
					throw new InvalidArgumentException( 'リッチメニューエイリアスの形式が正しくありません。', Code::UNKNOWN_ERROR, $e );
				case 404:
					throw new InvalidArgumentException( 'リッチメニューエイリアスが見つかりません。', Code::NOT_FOUND, $e );
				default:
					throw new RuntimeException( 'リッチメニューエイリアスの更新に失敗しました。', Code::MESSAGING_API_ERROR, $e );
			}
		}
	}
}
