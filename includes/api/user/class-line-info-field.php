<?php
/**
 * ユーザーAPIにLINE情報を追加
 *
 * @package LClutch\API\User
 */

namespace LClutch\API\User;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\API\LC_REST_Controller;
use LClutch\API\OpenAPI\OpenAPI_Schemas;
use LClutch\API\OpenAPI\OpenAPI_Headers;
use LClutch\API\OpenAPI\OpenAPI_Parameters;
use LClutch\Model\Entity\User;
use LClutch\Utils\Initialize_Trait;

/**
 * ユーザーAPIにLINE情報を追加
 */
class Line_Info_Field {

	use Initialize_Trait;

	/**
	 * コンストラクタ
	 */
	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_fields' ) );
	}

	/**
	 * フィールドの登録
	 */
	public function register_fields() {
		register_rest_field(
			'user',
			'line_info',
			array(
				'get_callback'    => array( $this, 'get_item' ),
				'update_callback' => null,
			)
		);
		LC_REST_Controller::add_path_schema( '~/wp/v2/users/{id}', array( $this, 'get_openapi_schema' ) );
		LC_REST_Controller::add_path_schema( '~/wp/v2/users', array( $this, 'get_openapi_list_schema' ) );
	}

	/**
	 * ユーザーのLINE情報を取得
	 *
	 * @param WP_User $user ユーザー.
	 */
	public function get_item( $user ) {
		if ( ! User::get_current()->has_cap( 'manage_options' ) ) {
			return;
		}

		$user         = new User( $user['id'] );
		$line_account = array(
			'user_id'      => $user->get_line_user_id(),
			'display_name' => $user->get_line_display_name(),
		);

		if ( $user->get_line_status_message() !== null ) {
			$line_account['status_message'] = $user->get_line_status_message();
		}

		if ( $user->get_line_email() !== null ) {
			$line_account['email'] = $user->get_line_email();
		}

		if ( $user->get_line_picture_url() !== null ) {
			$line_account['picture_url'] = $user->get_line_picture_url();
		}

		if ( $user->get_line_friend_flag() !== null ) {
			$line_account['friend_flag'] = $user->get_line_friend_flag();
		}

		if ( $user->get_line_is_blocked() !== null ) {
			$line_account['is_blocked'] = $user->get_line_is_blocked();
		}

		if ( $user->get_line_language() !== null ) {
			$line_account['language'] = $user->get_line_language();
		}

		if ( $user->get_line_last_login_at() !== null ) {
			$line_account['logged_in_at'] = gmdate( 'Y-m-d\TH:i:s\Z', $user->get_line_last_login_at() );
		}

		return $line_account;
	}

	/**
	 * Open APIスキーマを取得
	 */
	public function get_openapi_schema() {
		return array(
			'get' => array(
				'summary'     => 'ユーザー',
				'description' => 'ユーザーを取得します',
				'responses'   => array(
					'200' => array(
						'description' => '成功',
						'content'     => OpenAPI_Schemas::get_json_reference( 'api/wp-user.json' ),
					),
				),
			),
		);
	}

	/**
	 * Open APIスキーマを取得(リスト)
	 */
	public function get_openapi_list_schema() {
		return array(
			'get' => array(
				'summary'     => 'ユーザー一覧',
				'description' => 'ユーザー一覧を取得します。',
				'parameters'  => array(
					OpenAPI_Parameters::get_page_reference(),
					OpenAPI_Parameters::get_per_page_reference(),
				),
				'responses'   => array(
					'200' => array(
						'description' => '成功',
						'headers'     => OpenAPI_Headers::get_list_reference(),
						'content'     => OpenAPI_Schemas::get_list_content_reference( 'api/wp-user.json' ),
					),
				),
			),
		);
	}
}
