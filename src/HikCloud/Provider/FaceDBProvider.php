<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 超脑人脸库管理
	 *  ======================================================
	 */

	namespace Imactool\IotCloud\HikCloud\Provider;

	use Imactool\IotCloud\HikCloud\AbstractProvider;

	class FaceDBProvider extends AbstractProvider
	{
		/**
		 * 超脑人脸库列表
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function faceList(array $params)
		{
			return $this->getJson('/api/v1/estate/device/faceDatabase/actions/list',$params);
		}

		/**
		 * 超脑人脸库添加人脸
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function ddFace(array $params)
		{
			return $this->postJson('/api/v1/estate/device/faceDatabase/actions/addFace',$params);
		}

		/**
		 * 超脑人脸库删除人脸
		 * @param $faceids
		 *
		 * @return mixed
		 * @author cc
		 */
		public function delFaces($faceids)
		{
			return $this->postJson('/api/v1/estate/device/faceDatabase/actions/delFaces',['faceIds'=>$faceids]);
		}

		/**
		 * 同步超脑人脸库
		 * @param string $faceDatabaseId
		 *
		 * @return mixed
		 * @author cc
		 */
		public function syncFaceDatabase(string $faceDatabaseId)
		{
			return $this->getJson('/api/v1/estate/device/faceDatabase/actions/syncFaceDatabase',['faceDatabaseId'=>$faceDatabaseId]);
		}
	}