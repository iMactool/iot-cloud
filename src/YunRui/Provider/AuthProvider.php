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
	namespace  Imactool\IotCloud\YunRui\Provider;

	use Imactool\IotCloud\YunRui\AbstractProvider;

	class AuthProvider extends AbstractProvider
	{
		/**
		 * 获取云睿平台配置
		 * @return mixed
		 *              返回值：
		 *               androidCode Android安全码
		 *               iosCode iOS安全码
		 *               realmName 视频播放初始化所需环境
		 * @author cc
		 */
		public function getLechangeConfig()
		{
			return $this->getJson('/gateway/membership/api/common/getLechangeConfig');
		}

		/**
		 * 乐橙
		 * accessToken：获取管理员token
		 * 根据管理员账号appId和appSecret获取accessToken，appId和appSecret可以在控制台-我的应用-应用信息中找到。
		 * @author cc
		 */
		public function getImouAccessToken()
		{
			return $this->postJson('/openapi/accessToken');
		}
	}