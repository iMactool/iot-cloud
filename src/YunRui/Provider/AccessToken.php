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


	trait AccessToken
	{

		private ?string $accessToken = null;
		private ?string $userName    = null;
		private int     $expireTime  = 0;

		public function getAccessToken()
		{
			$params = [
				'client_id'     => trim($this->config->getYunRuiConfig()['client_id']),
				'client_secret' => trim($this->config->getYunRuiConfig()['client_secret']),
				'grant_type'    => 'client_credentials',
				'scope'         => 'server'
			];

			if (empty($params['client_id']) || empty($params['client_secret']))
			{
				return null;
			}

			if (! $this->isExpired()) {
				return $this->accessToken;
			}
			$options = [
				'headers'     => [],
				'form_params' => $params,
				'query'       => $params
			];
			$result =	$this->setBaseUri('https://www.cloud-dahua.com')->request('POST','/gateway/auth/oauth/token',$options);

			$this->accessToken  = $result['access_token'];
			$this->userName     = $result['username'];
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

		public function getUserName()
		{
			$params = [
				'client_id'     => trim($this->config->getYunRuiConfig()['client_id']),
				'client_secret' => trim($this->config->getYunRuiConfig()['client_secret']),
				'grant_type'    => 'client_credentials',
				'scope'         => 'server'
			];

			if (empty($params['client_id']) || empty($params['client_secret']))
			{
				return null;
			}

			if (! $this->isExpired()) {
				return $this->userName;
			}
			$options = [
				'headers'     => [],
				'form_params' => $params,
				'query'       => $params
			];
			$result =	$this->setBaseUri('https://www.cloud-dahua.com')->request('POST','/gateway/auth/oauth/token',$options);
			$this->accessToken  = $result['access_token'];
			$this->userName     = $result['username'];
			$this->expireTime   = $result['expires_in'] + time();

			return $this->userName;
		}

	}