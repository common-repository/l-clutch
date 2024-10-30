<?php
/**
 * エンティティAPIのベースクラス
 *
 * @package LClutch\API
 */

namespace LClutch\API;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use InvalidArgumentException;
use WP_REST_Request;
use WP_REST_Response;
use LClutch\Model\DAO\DAO_Interface;
use LClutch\Utils\Array_Key_Converter;

/**
 * エンティティAPIのベースクラス
 */
abstract class Entity_API_Base extends LC_REST_Controller {

	/**
	 * DAOのインスタンスを取得
	 */
	abstract protected function get_dao(): DAO_Interface;

	/**
	 * DTOクラス名を取得
	 */
	abstract protected function get_dto_class_name(): string;


	/**
	 * 一覧の取得
	 *
	 * @param WP_REST_Request $request リクエスト.
	 * @return WP_REST_Response
	 */
	public function get_items( $request ) {
		$dao    = $this->get_dao();
		$params = $this->request_to_dao_params( $request );
		$dtos   = $dao->get_items( $params );

		$items = array();
		foreach ( $dtos as $dto ) {
			$items[] = $this->prepare_item_for_response( $dto, $request );
		}

		$total    = $dao->get_count( $params );
		$per_page = $request->get_param( 'per_page' ) ?? 10;

		$response = new WP_REST_Response(
			$items,
			200,
			array(
				'X-WP-Total'      => $total,
				'X-WP-TotalPages' => ceil( $total / $per_page ),
			)
		);
		return $response;
	}

	/**
	 * アイテムリスト取得リクエストをDAOのパラメータに変換
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	protected function request_to_dao_params( $request ) {
		$page     = $request->get_param( 'page' );
		$per_page = $request->get_param( 'per_page' );
		$status   = $request->get_param( 'status' );
		$params   = array(
			'limit'  => $per_page,
			'offset' => ( $page - 1 ) * $per_page,
		);

		if ( $status !== null ) {
			$params['status'] = $status;
		}

		return $params;
	}

	/**
	 * 取得
	 *
	 * @param WP_REST_Request $request リクエスト.
	 * @return WP_REST_Response
	 */
	public function get_item( $request ) {
		$id  = $request->get_url_params()['id'];
		$dao = $this->get_dao();
		$dto = $dao->get( $id );

		if ( $dto === null ) {
			return new WP_REST_Response( 'Not Found', 404 );
		}

		$result = $this->prepare_item_for_response( $dto, $request );
		return new WP_REST_Response( $result, 200 );
	}

	/**
	 * 作成
	 *
	 * @param WP_REST_Request $request リクエスト.
	 * @return WP_REST_Response
	 */
	public function create_item( $request ) {
		$body = json_decode( $request->get_body(), true );
		$args = Array_Key_Converter::camel_to_snake_recursive( $body );

		try {
			$dto_class_name = $this->get_dto_class_name();
			$dto            = new $dto_class_name( $args );
		} catch ( InvalidArgumentException $e ) {
			return new WP_REST_Response( $e->getMessage(), 400 );
		}

		try {
			$dao = $this->get_dao();
			$dto = $dao->create( $dto );
		} catch ( InvalidArgumentException $e ) {
			return new WP_REST_Response( $e->getMessage(), 400 );
		}

		$result = $this->prepare_item_for_response( $dto, $request );
		return new WP_REST_Response( $result, 200 );
	}

	/**
	 * 更新
	 *
	 * @param WP_REST_Request $request リクエスト.
	 * @return WP_REST_Response
	 */
	public function update_item( $request ) {
		$id  = $request->get_url_params()['id'];
		$dao = $this->get_dao();
		$dto = $dao->get( $id );

		if ( ! $dto ) {
			return new WP_REST_Response( 'Not Found', 404 );
		}

		$body = json_decode( $request->get_body(), true );
		$args = Array_Key_Converter::camel_to_snake_recursive( $body );

		try {
			$dto = $dto->with( $args );
			$dto = $dao->update( $dto );
		} catch ( InvalidArgumentException $e ) {
			return new WP_REST_Response( $e->getMessage(), 400 );
		}

		$result = $this->prepare_item_for_response( $dto, $request );
		return new WP_REST_Response( $result, 200 );
	}

	/**
	 * リッチメニューを削除
	 *
	 * @param WP_REST_Request $request リクエスト.
	 * @return WP_REST_Response
	 */
	public function delete_item( $request ) {
		$id  = $request->get_url_params()['id'];
		$dao = $this->get_dao();
		$dto = $dao->get( $id );

		if ( ! $dto ) {
			return new WP_REST_Response( 'Not Found', 404 );
		}

		$dao->delete( $dto );
		$result = $this->prepare_item_for_response( $dto, $request );
		return new WP_REST_Response( $result, 200 );
	}
}
