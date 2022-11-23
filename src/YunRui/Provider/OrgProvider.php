<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 大华云睿 - 组织管理
	 *  ======================================================
	 */

	namespace Imactool\IotCloud\YunRui\Provider;

	use Imactool\IotCloud\YunRui\AbstractProvider;

	class OrgProvider extends AbstractProvider
	{
		/**
		 * 新增组织
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function addOrg(array $params)
		{
			return $this->postJson('/gateway/membership/api/org',$params);
		}

		/**
		 * 获取组织列表
		 * 注意：
		 * 大华云睿平台组织类型有五种，分别是组织、场所、楼栋、单元、房屋，由不同接口创建。
		 *   其中场所类型的组织有更多的业务信息，比如地址、负责人信息等；场所即门店、即小区，根据不同产品类型称呼。
		 *   其中楼栋、单元、房屋类型的组织是针对大华云睿·社区业务场景而设计的。
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getOrgList(array $params)
		{
			return $this->postJson('/gateway/membership/api/org/list',$params);
		}

		/**
		 * 删除组织
		 * 若当前组织或子组织下挂有设备，不允许删除。该接口会级联删除该组织下的所有组织。
		 * @param string $orgCode
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deleteOrg(string $orgCode)
		{
			$params = [
				'orgCode' => $orgCode
			];
			return $this->postJson('/gateway/membership/api/org/'.$orgCode,$params);
		}

		/**
		 * 获取场所列表
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getPlaceList(array $params)
		{
			return $this->getJson('/gateway/membership/api/store/page',$params);
		}

		/**
		 * 新增场所
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function addPlace(array $params)
		{
			return $this->postJson('/gateway/membership/api/store/add',$params);
		}

		/**
		 * 删除场所
		 * 入参为场所的组织编码orgCode集合，系统会删除此组织下的所有相关联场所组织涉及错误码以及错误信息
		 * 注：单次删除组织数量不能超过十个
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deletePlace(array $params = [])
		{
			return $this->postJson('/gateway/membership/api/store/delete',$params);
		}

		/**
		 * 修改场所信息
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function updatePlace(array $params)
		{
			return $this->postJson('/gateway/membership/api/store/update',$params);
		}

		/**
		 * 根据名称查询场所
		 * @param string $storeName
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getPlaceByName(string $storeName)
		{
			$params = [
				'storeName' => $storeName
			];
			return $this->getJson('/gateway/membership/api/store/getStoreByStoreName',$params);
		}

		/**
		 * 获取单个组织（场所）详情
		 * @param string $key
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getOrgByNumberOrPlaceId(string $key)
		{
			$params = [
				'key' => $key
			];
			return $this->getJson('/gateway/membership/api/storeOrg/house/getOne/'.$key,$params);
		}

	}