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
	namespace Imactool\IotCloud;

	class Config
	{
		protected $appConfig;

		protected array $guzzleConfig = [
			'headers' => [
				'charset' => 'UTF-8',
			],
			'http_errors' => false,
		];

		public function __construct( array $config )
		{
			$this->appConfig = $config;
		}

		public function getAppConfig()
		{
			return $this->appConfig;
		}

		public function getHikConfig() : array
		{
			return $this->getAppConfig()['hikcloud'];
		}

		public function getYunRuiConfig() : array
		{
			return $this->getAppConfig()['yunrui'];
		}

		/**
		 * 海康云眸
		 * @return string
		 * @author cc
		 */
		public function getHikCloudBaseUri() : string
		{
			return  'https://api2.hik-cloud.com';
		}

		/**
		 * 萤石云
		 * @return string
		 * @author cc
		 */
		public function getYsCloudBaseUri(): string
		{
			return 'https://open.ys7.com';
		}

		/**
		 * 大华云睿
		 * @return string
		 * @author cc
		 */
		public function getDaHuaYunRuiBaseUri() :string
		{
			return 'https://www.cloud-dahua.com';
		}

		/**
		 * 乐橙
		 * @return string
		 * @author cc
		 */
		public function getLeChengeBaseUri():string
		{
			return 'https://openapi.lechange.cn';
		}

		public function getGuzzleConfig() : array
		{
			return $this->guzzleConfig;
		}
	}