<?php
/**
 * LClutchのコアプラグインのメインクラス
 *
 * @package LClutch
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\Utils\Singleton_Trait;

/**
 * LClutchのコアプラグインのメインクラス
 */
class LClutch {

	use Singleton_Trait;

	/** プラグインのフォルダ名 */
	const PLUGIN_DIR_NAME = 'l-clutch';

	/** プラグインディレクトリのパス */
	const ROOT_DIR = WP_PLUGIN_DIR . '/l-clutch';

	/** プラグインのメインファイルのパス */
	const PLUGIN_FILE = WP_PLUGIN_DIR . '/l-clutch/l-clutch.php';

	/** データベースのプレフィックス */
	const DB_PREFIX = 'l_clutch_';

	/**
	 * コンストラクタ
	 */
	public function __construct() {
		register_activation_hook( self::PLUGIN_FILE, array( self::class, 'activate' ) );
		register_uninstall_hook( self::PLUGIN_FILE, array( self::class, 'uninstall' ) );

		LClutch\Model\Entity\User::initialize();
		LClutch\Model\DAO\RichMenu_DB_DAO::get_instance();

		LClutch\Controller\Package_Controller::initialize();
		LClutch\Controller\Admin_Menu_Controller::initialize();
		LClutch\Controller\Block_Controller::initialize();
		LClutch\Controller\Shortcode_Controller::initialize();
		LClutch\Controller\Line_Login_Controller::initialize();
		LClutch\Controller\Que_Controller::initialize();

		LClutch\API\OpenAPI\OpenAPI_API::initialize();
		LClutch\API\Line_Messaging_API\Webhook_API::initialize();
		LClutch\API\Setting\Login_Channel_API::initialize();
		LClutch\API\Setting\Login_Channel\Check_Login_URL_API::initialize();
		LClutch\API\Setting\Login_Channel\Linked_Official_Account_API::initialize();
		LClutch\API\Setting\Messaging_Channel_API::initialize();
		LClutch\API\Setting\Messaging_Channel\Bot_Info_API::initialize();
		LClutch\API\Setting\Messaging_Channel\Webhook_API::initialize();
		LClutch\API\User\Line_Info_Field::initialize();
		LClutch\API\RichMenu\RichMenu_API::initialize();
		LClutch\API\RichMenu\Default_Rich_Menu_API::initialize();
		LClutch\API\RichMenu\RichMenu_ID_API::initialize();
	}

	/**
	 * アクティベート時の処理
	 */
	public static function activate() {
		LClutch\Model\Entity\User::activate();
		LClutch\Model\DAO\RichMenu_DB_DAO::activate();
	}

	/**
	 * アンインストール時の処理
	 */
	public static function uninstall() {
		LClutch\Model\DAO\RichMenu_DB_DAO::uninstall();
		LClutch\Model\Line_Channel\Login_Channel::uninstall();
		LClutch\Model\Line_Channel\Messaging_Channel::uninstall();
		LClutch\Model\DAO\RichMenu_DAO::uninstall();
	}
}
