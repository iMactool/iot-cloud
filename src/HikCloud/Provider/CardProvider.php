<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 卡片管理
	 *  ======================================================
	 */

	namespace Imactool\IotCloud\HikCloud\Provider;

	use Imactool\IotCloud\HikCloud\AbstractProvider;

	class CardProvider extends AbstractProvider
	{
		/**
		 * 添加一张新的空白卡片。
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function addCard(array $params)
		{
			return $this->postJson('/api/v1/estate/system/cards',$params);
		}

		/**
		 * 删除一张空白卡。
		 * @param string $cardId
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deleteCard(string $cardId)
		{
			$endpoint = '/api/v1/estate/system/cards/'.$cardId;
			return $this->deleteJson($endpoint,['cardId'=>$cardId]);
		}

		/**
		 * 给人员开通卡片。
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function openCard(array $params)
		{
			return $this->postJson('/api/v1/estate/system/cards/actions/openCard',$params);
		}

		/**
		 * 退卡
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function refundCard(array $params)
		{
			return $this->postJson('/api/v1/estate/system/cards/actions/refundCard',$params);
		}

		/**
		 * 换卡
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function changeCard(array $params)
		{
			return $this->postJson('/api/v1/estate/system/cards/actions/changeCard',$params);
		}

		/**
		 * 挂失
		 * @param $cardId
		 *
		 * @return mixed
		 * @author cc
		 */
		public function lossCard($cardId)
		{
			return $this->postJson('/api/v1/estate/system/cards/actions/lossCard',['cardId'=>$cardId]);
		}

		/**
		 * 解挂
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function cancelLossCard(array $params)
		{
			return $this->postJson('/api/v1/estate/system/cards/actions/cancelLossCard',$params);
		}

		/**
		 * 补卡
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function reissueCard(array $params)
		{
			return $this->postJson('/api/v1/estate/system/cards/actions/reissueCard',$params);
		}

		/**
		 * 查卡
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getCards(array $params)
		{
			return $this->postJson('/api/v1/estate/system/cards/actions/getCards',$params);
		}

	}