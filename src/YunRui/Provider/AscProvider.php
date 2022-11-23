<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 门禁子系统 Access control subsystem
	 *  ======================================================
	 */

	namespace Imactool\IotCloud\YunRui\Provider;

	use Imactool\IotCloud\YunRui\AbstractProvider;

	class AscProvider extends AbstractProvider
	{
		/**
		 * 获取业主二维码
		 * @param $personFileId
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getQrcode($personFileId)
		{
			$params = ['personFileId' => $personFileId];
			return $this->getJson('/gateway/dsc-owner/api/qrcode',$params);
		}

		/**
		 * 查询授权记录
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function searchAuthRecord(array $params = [])
		{
			return $this->postJson('/gateway/dsc-owner/api/getAuth',$params);
		}

		/**
		 * 修改开门计划
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function updateDoorTimePlan(array $params)
		{
			return $this->postJson('/gateway/dsc-owner/api/accessControl/editTimePlan',$params);
		}

		/**
		 *  设置门禁设备状态
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function setDoorStatus(array $params)
		{
			return $this->postJson('/gateway/dsc-owner/api/accessControl/setConfig/doorStatus',$params);
		}

		/**
		 *  设备设置常开时间段常闭时间段
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function setDoorOpenTimePlan(array $params)
		{
			return $this->postJson('/gateway/dsc-owner/api/accessControl/deviceTimePlan',$params);
		}

		/**
		 *  可批量请求，云睿会放入队列进行异步授权，授权结果要通过订阅云睿平台-开放平台-开发者服务-授权结果来得知。
		 *  授权结果协议见大华云睿开放平台-推送订阅-授权结果
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function batchAuthDevice(array $params)
		{
			return $this->postJson('/gateway/dsc-owner/api/authAsync',$params);
		}

		/**
		 * 新增开门计划
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function addDoorTimePlan(array $params)
		{
			return $this->postJson('/gateway/dsc-owner/api/accessControl/addTimePlan',$params);
		}

		/**
		 * 获取开门计划
		 * @param null $timeIndex
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getDoorTimePlan($timeIndex = NULL)
		{
			$params = ['timeIndex'=>$timeIndex];
			return $this->postJson('/gateway/dsc-owner/api/accessControl/getTimePlan',$params);
		}

		/**
		 * 获取业主开门记录
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getWonerDoorOpenRecord(array $params)
		{
			return $this->postJson('/gateway/dsc-messagecenter/api/openDoorRecord/owner/get',$params);
		}

		/**
		 * 获取单个设备下发的开门计划
		 * @param string $deviceId
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getTimePlanForDevice(string $deviceId)
		{
			$params = ['deviceId'=>$deviceId];
			return $this->postJson('',$params);
		}

		/**
		 * t 此接口下发该人员到设备上。 接口是实时返回。
		 * 下发成功返回见“返回数据设置”。
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function syncAuthPersonToDevice(array $params)
		{
			return $this->postJson('/gateway/dsc-owner/api/addAuth',$params);
		}

		/**
		 * 删除人员授权
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deleteAuthPersonFormDevice(array $params)
		{
			return $this->deleteJson('/gateway/dsc-owner/api/deleteAuth',$params);
		}

		/**
		 *  删除个人的所有设备授权
		 * @param $personFileId
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deleteAllAuthByPersonId($personFileId)
		{
			$params = ['personFileId'=>$personFileId];
			return $this->deleteJson('/gateway/dsc-owner/api/deleteAuthByPersonId',$params);
		}

		/**
		 * 远程开门
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function remoteOpenDoor(array $params)
		{
			return $this->postJson('/gateway/dsc-owner/api/openDoor',$params);
		}

		/**
		 * 批量查询设备开/关状态
		 * @param $deviceIdList
		 *
		 * @return mixed
		 * @author cc
		 */
		public function batchGetDoorStatus($deviceIdList)
		{
			$params = [
				'deviceIdList' => $deviceIdList
			];
			return $this->postJson('/gateway/dsc-owner/api/accessControl/multiGetDoorStatus',$params);
		}

		/**
		 *  临时密码下发
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function downTempPassword(array $params)
		{
			return $this->postJson('/gateway/dsc-door/api/tempPassword/set',$params);
		}

		/**
		 * 临时密码取消
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function cancelTempPassword(array $params)
		{
			return $this->postJson('/gateway/dsc-door/api/tempPassword/cancel',$params);
		}

		/**
		 * 获取设备人脸算法版本
		 * @param string $deviceId
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getDeviceFaceAlgorithmVersion(string $deviceId)
		{
			return $this->postJson('/gateway//dsc-door/api/getDeviceFaceAlgorithmVersion',['deviceId'=>$deviceId]);
		}
	}