<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 直播管理
	 *  ======================================================
	 */

	namespace Imactool\IotCloud\YunRui\Provider;

	use Imactool\IotCloud\YunRui\AbstractProvider;

	class LiveProvider extends AbstractProvider
	{
		/**
		 *
		 *  查询设备RTMP地址
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getDeviceRtmp(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/queryRtmpLive',$params);
		}

		/**
		 * 创建设备RTMP地址
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function createDeviceRtmp(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/createRtmpLive',$params);
		}

		/**
		 * 删除设备RTMP地址
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deleteDeviceRtmp(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/deleteRtmpLive',$params);
		}

		/**
		 * 修改直播时间段
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function updateLiveInfo(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/device/updateLiveInfo',$params);
		}

		/**
		 * 创建flv录像
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function createFlvVideo(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/createFlvVideo',$params);
		}

		/**
		 * 创建flv直播
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function createFlvLive(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/createFlvLive',$params);
		}


		/**
		 * 创建用户的设备直播
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function createUserLive(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/device/live',$params);
		}

		/**
		 * 删除flv直播
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deleteFlvLive(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/deleteFlvLive',$params);
		}

		/**
		 * 删除直播地址
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deleteLive(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/unLive',$params);
		}

		/**
		 * 分页获取直播列表
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getLivePageList(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/device/livePageList',$params);
		}

		/**
		 * 开启关闭直播
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function updateLiveStatus(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/device/modifyLiveStatus',$params);
		}

		/**
		 * 查询flv直播
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getFlvLive(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/queryFlvLive',$params);
		}

		/**
		 * 查询hls直播地址和直播状态
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getHlsLiveInfo(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/device/liveInfo',$params);
		}


		/**
		 * 根据设备录像片段生成hls直播地址
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function createDeviceRecordHls(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/createDeviceRecordHls',$params);
		}

		/**
		 * 获取接入设备RTMP地址
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getDeviceRtmpUrl(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/getRtmpUrl',$params);
		}

		/**
		 * 获取直播列表
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getLiveList(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/page/liveList',$params);
		}

		public function getCloudRecords(array $params)
		{
			return $this->postJson('/gateway/videobussiness/api/getCloudRecords',$params);
		}
	}