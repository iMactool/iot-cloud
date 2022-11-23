<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 人员档案
	 *  ======================================================
	 */

	namespace Imactool\IotCloud\YunRui\Provider;

	use Imactool\IotCloud\YunRui\AbstractProvider;

	class PersonProvider extends AbstractProvider
	{
		/**
		 * 新增房屋信息
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function addHouse(array $params)
		{
			return $this->postJson('/gateway/person/api/houseInfo',$params);
		}

		/**
		 * 删除房屋信息
		 * @param $personFileId
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deleteHouse($personFileId)
		{
			$params = [
				'personFileId' => $personFileId
			];
			return $this->getJson(' /gateway/person/api/deletehouseInfo/'.$personFileId,$params);
		}

		/**
		 * 新增人员基础信息
		 * 调用步骤：
		调用新增人员基础信息
		调用新增认证信息
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function addPersonProfile(array $params)
		{
			return $this->postJson('/gateway/person/api/personFile',$params);
		}

		/**
		 * 更新人员基础信息
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function updatePersonProfile(array $params)
		{
			return $this->putJson('/gateway/person/api/personFile',$params);
		}

		/**
		 * 新增人证信息
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function addPersonIdentity(array $params)
		{
			return $this->putJson('/gateway/person/api/personIdentity',$params);
		}

		/**
		 * 修改人员认证信息
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function updatePersonIdentity(array $params)
		{
			return $this->putJson('/gateway/person/api/personIdentity',$params);
		}

		/**
		 * 删除人员
		 * @param $personFileId
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deletePerson($personFileId)
		{
			$params = ['personFileId'=>$personFileId];
			return $this->deleteJson('/gateway/dsc-owner/api/deletePerson/'.$personFileId,$params);
		}

		/**
		 * 根据组织批量删除人员
		 * 该接口请务必谨慎操作，删除之后的人员云睿无法复原。
		请尽可能不要使用orgCode = 001 来删除该公司下所有人员。
		 * @param $orgCode
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deletePersonByOrg($orgCode)
		{
			$params = ['orgCode'=>$orgCode];
			return $this->deleteJson('/gateway/person/api/deleteByOrg',$params);
		}

		/**
		 * 查询人员档案分页信息
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getPersonProfile(array $params)
		{
			return $this->postJson('/gateway/person/api/personFile/page',$params);
		}

		/**
		 * 根据personFileId查询人员信息
		 * @param $personFileId
		 * @author cc
		 */
		public function getPersonByPrfoleId($personFileId)
		{
			$params = ['personFileId'=>$personFileId];
			return $this->getJson('/gateway/person/api/personFile/'.$personFileId , $params);
		}

		/**
		 * 删除人员档案车牌信息
		 * @param $personFileId
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deletePersonCarNum($personFileId)
		{
			$params = ['personFileId'=>$personFileId];
			return $this->deleteJson('/gateway/person/personsCarNum',$params);
		}

		/**
		 * 删除下级人员在上级的备份数据
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deletePersonPreBackData(array $params)
		{
			return $this->deleteJson('/gateway/person/api/personFile',$params);
		}

		/**
		 * 根据人员编码（personCode）查询人员列表.
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function selectByPersonCode(array $params)
		{
			return $this->postJson('/gateway/person/api/selectByPersonCode',$params);
		}
	}