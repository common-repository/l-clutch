<?php
/**
 * URIアクション
 *
 * @package LClutch\Model\DTO\Line_Action
 */

namespace LClutch\Model\DTO\Line_Action;

use LClutch\Model\DTO\DTO_Base;
use LClutch\Model\DTO\OpenAPI_DTO_Trait;
use LClutch\LineApi\MessagingApi\Model\URIAction;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * URIアクション
 */
class URI_Action_DTO extends DTO_Base {

	use OpenAPI_DTO_Trait;

	const SCHEMA_FILE = 'line-action/uri-action.json';

	/**
	 * アクションの種類を取得する
	 */
	public function get_type(): string {
		return 'uri';
	}

	/**
	 * URIを取得する
	 *
	 * @return string
	 */
	public function get_uri() {
		return $this->get_container( 'uri' );
	}

	/**
	 * 代替URIを取得する
	 *
	 * @return array
	 */
	public function get_alt_uri() {
		return $this->get_container( 'alt_uri' );
	}

	/**
	 * OpenAPIオブジェクトに変換する
	 */
	public function to_openapi() {
		$action = new URIAction( $this->to_array() );
		$action->setType( 'uri' );
		return $action;
	}
}
