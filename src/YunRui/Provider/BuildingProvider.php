<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 楼栋管理 - 云睿
	 *  ======================================================
	 */

	namespace Imactool\IotCloud\YunRui\Provider;

	use Imactool\IotCloud\YunRui\AbstractProvider;

	class BuildingProvider extends AbstractProvider
	{
		/**
		 * 楼栋删除（单元房屋一并删除）
		 * 大华云睿平台组织类型有五种，分别是组织、场所、楼栋、单元、房屋，由不同接口创建。
		 * 其中场所类型的组织有更多的业务信息，比如地址、负责人信息等；场所即门店、即小区，根据不同产品类型称呼。
		 * 其中楼栋、单元、房屋类型的组织是针对大华云睿·社区业务场景而设计的。
		 * @param $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deleteBuilding($params)
		{
			return $this->deleteJson('/gateway/membership/api/storeOrg/10',$params);
		}

		/**
		 * 新增楼栋单元房屋
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function addBuilding(array $params)
		{
			return $this->postJson('/gateway/membership/api/storeOrg/buildings',$params);
		}

		/**
		 * 查询房屋分页
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getBuildingRoomForPage(array $params)
		{
			return $this->getJson('/gateway/membership/api/storeOrg/house/page',$params);
		}

		/**
		 * 查询楼栋
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getBuildingForPage(array $params)
		{
			return $this->getJson('/gateway/membership/api/storeOrg/building/page',$params);
		}

		/**
		 * 查询楼栋、单元、房屋信息
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getBuidingUnitRoomList(array $params)
		{
			return $this->postJson('/gateway/membership/api/org/page',$params);
		}

		/**
		 * 楼栋修改
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function updateBuilding(array $params)
		{
			return $this->postJson('/gateway/membership/api/storeOrg/update',$params);
		}

		/**
		 * 获取房屋详情
		 * @param $key
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getBuildingRoomInfo(string $key)
		{
			$params = [
				'key' => $key
			];
			return $this->getJson('/gateway/membership/api/storeOrg/house/'.$key,$params);
		}
	}