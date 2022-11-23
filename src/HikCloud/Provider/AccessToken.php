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


	trait AccessToken
	{
		private ?string $accessToken = null;
		private int     $expireTime  = 0;

		public function getAccessToken()
		{
			$params = [
				'client_id'     => trim($this->config->getHikConfig()['client_id']),
				'client_secret' => trim($this->config->getHikConfig()['client_secret']),
				'grant_type'    => 'client_credentials',
			];

			if (empty($params['client_id']) || empty($params['client_secret']))
			{
				return null;
			}

			if (! $this->isExpired()) {
				return $this->accessToken;
			}
			$options = [
				'headers' => [],
				'form_params' => $params,
			];
			$result =	$this->setBaseUri('https://api2.hik-cloud.com')->request('POST','/oauth/token',$options);
//		    file_put_contents('Application2.log',print_r(["尝试获取 AccessToken trait "=>$options,
//		                                                  '生成授权凭证（access_token）'=>$result] ,true).PHP_EOL , 8);
			$this->accessToken  = $result['access_token'];
			$this->expireTime   = $result['expires_in'] + time();

			return $this->accessToken;
		}

		public function isExpired() : bool
		{
			if ( isset($this->accessToken) && $this->expireTime > time() + 60){
				return  false;
			}
			return  true;
		}
	}