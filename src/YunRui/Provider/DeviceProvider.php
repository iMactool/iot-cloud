<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Imactool\IotCloud\YunRui\Provider;

	use Imactool\IotCloud\YunRui\AbstractProvider;

	class DeviceProvider extends AbstractProvider
	{
		/**
		 * 获取设备列表
		 *  设备小类devType分类如下：
		 *  设备大类	        设备小类
		1-视频设备	    DVR(1), IPC(2), NVS(3), MDVR(5), NVR(6), PVR(9), EVS(10), SMART_IPC(12), SMART_NVR(14), VTT(21),HCVR(32), SD(33), IHG(34), ARC(35), IVSS(26)
		8-门禁设备	    普通门禁-1, RFID-8, BSC-23, ASG-24
		21-可视对讲设备	VTO(2)—-门口机,VTH(3)—数字室内机, VTH_ANALOG(4)—模拟室内机,VTO_FENCE(5)—围墙机,VTH_LOCK(6)—室内机（支持门锁）,VTO_ANALOG(7)—-半数字门口机,VTS(8)—管理机,VTNC_UNIT_DISTRIBUTOR(9)-单元联网分配器,VTM_SIP(10)— SIP电话网关,VTO_PHOTO(11)—白光门口机,VTO_HONGWAI(12)—-红外门口机,VTO_VISITOR(13)—云访客自助终端,VTO_FENCE_HONGWAI(14)—红外围墙机,VTO_FENCE_PHOTO(15)—白光围墙机
		32-消防主机	    1-XHAGW
		42-NB消防设备	1-NB
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getDeviceList(array $params)
		{
			return $this->postJson('/gateway/device/api/page',$params);
		}

		/**
		 * 设备订阅.
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function subEvent(array $params)
		{
			return $this->postJson('/gateway/devicemanage/api/subEvents',$params);
		}

		/**
		 *  查询单个设备详情
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getDeviceInfo(array $params)
		{
			return $this->postJson('/gateway/device/api/deviceInfo',$params);
		}

		/**
		 * 修改设备信息
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function updateDevice(array $params)
		{
			return $this->postJson('/gateway/device/api/modifyDeviceInfo',$params);
		}

		/**
		 * 添加设备
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function addDevice(array $params)
		{
			if (isset($params['devUsername'])){
				$params['devUsername'] = base64_encode($params['devUsername']);
			}
			if (isset($params['devPassword'])){
				$params['devPassword'] = base64_encode($params['devPassword']);
			}
			return $this->postJson('/gateway/device/api/addDevice',$params);
		}

		/**
		 * 删除设备
		 * @param string $deviceId
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deleteDevice(string $deviceId)
		{
			$params = [
				'deviceId' => $deviceId
			];
			return $this->postJson('/gateway/device/api/deleteDevice',$params);
		}

		/**
		 * 设备抓图
		 * 返回设备抓图地址（每秒一张图）。
		 * 注意：
		 * 1、由于平台下发抓图指令到设备，设备将图片异步写入此接口返回的地址中，所以此接口获取到的地址，不一定立马能访问到资源；
		 * 2、由于设备的性能不同，写入图片的效率也不一样。也有可能写入失败，若5s后，或更久都获取不到资源，建议重试。
		 * 3、客户端请求时间间隔需大于等于1s。返回结果中，抓图访问地址（url）7天内有效。
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getChannelSnap(array $params)
		{
			return $this->postJson('/gateway/device/api/getChannelSnap',$params);
		}

		/**
		 * 获取设备通道PTZ信息
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function devicePTZInfo(array $params)
		{
			return $this->postJson('/gateway/device/api/devicePTZInfo',$params);
		}

		/**
		 * 云台移动控制接口
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function controlMovePTZ(array $params)
		{
			return $this->postJson('/gateway/device/api/controlMovePTZ',$params);
		}

		/**
		 * 云台PTZ变焦接口
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function controlLocationPTZ(array $params)
		{
			return $this->postJson('/gateway/device/api/controlLocationPTZ',$params);
		}

		/**
		 * 根据时间段查询本地录像片段
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getVideoLocalRecords(array $params)
		{
			return $this->postJson('/gateway/device/api/getVideoLocalRecords',$params);
		}

		/**
		 * 根据时间段查询云存储录像片段
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getCloudVideoRecords(array $params)
		{
			return $this->postJson('/gateway/device/api/getCloudVideoRecords',$params);
		}

		/**
		 * 设备通道在离线时长统计
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getDeviceOnlineTime(array $params)
		{
			return $this->postJson('/gateway/devicestatus/api/getDeviceOnlineTime',$params);
		}
	}