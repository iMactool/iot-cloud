<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 物业人员管理
	 *  ======================================================
	 */

	namespace Imactool\IotCloud\HikCloud\Provider;

	use Imactool\IotCloud\HikCloud\AbstractProvider;

	class PropertyProvider extends AbstractProvider
	{
		/**
		 * 新增物业人员信息。
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function addProperty(array $params)
		{
			return $this->postJson('/api/v1/estate/system/property',$params);
		}

		/**
		 * 编辑物业人员信息。（全量修改）
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function updateProperty(array $params)
		{
			return $this->postJson('/api/v1/estate/system/property/actions/updateProperty',$params);
		}

		/**
		 * 删除物业人员
		 * @param string $personId
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deleteProperty(string $personId)
		{
			$endpoint = '/api/v1/estate/system/property/'.$personId;
			return $this->deleteJson($endpoint,['personId'=>$personId]);
		}
	}