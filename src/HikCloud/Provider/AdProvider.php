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

	namespace Imactool\IotCloud\HikCloud\Provider;

	use Imactool\IotCloud\HikCloud\AbstractProvider;

	class AdProvider extends AbstractProvider
	{
		/**
		 * 下发广告
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function publishProgram(array $params)
		{
			return $this->postJson('/api/v1/estate/publish/actions/publishProgram',$params);
		}

		/**
		 * 删除广告
		 * @param $deviceIds
		 *
		 * @return mixed
		 * @author cc
		 */
		public function deleteProgram($deviceIds)
		{
			return $this->postJson('/api/v1/estate/publish/actions/deleteProgram',['deviceIds'=>$deviceIds]);
		}
	}