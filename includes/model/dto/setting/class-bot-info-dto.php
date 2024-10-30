<?php
/**
 * ボット情報
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ボット情報
 */
class Bot_Info_DTO extends DTO_Base {

	const SCHEMA_FILE = 'setting/bot-info.json';

	/**
	 * ベーシックIDのゲッター
	 *
	 * @return ?string
	 */
	public function get_basic_id() {
		return $this->get_container( 'basic_id' );
	}
}
