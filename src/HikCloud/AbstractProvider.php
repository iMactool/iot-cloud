<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 请求方法
	 *  ======================================================
	 */

	namespace Imactool\IotCloud\HikCloud;

	use Imactool\IotCloud\Config;
	use Imactool\IotCloud\HikCloud\Provider\AccessToken;
	use Imactool\IotCloud\Kernel\HttpClient;

	abstract class AbstractProvider
	{
		use HttpClient,AccessToken;

		public function __construct(protected Application $app, protected Config $config)
		{

		}

		protected function httpClient()
		{
			return $this->setBaseUri($this->config->getHikCloudBaseUri());
		}

		public function get($endpoint ,$params =[] ,$headers = [])
		{
			$header = $this->generateHeader();
			if (!empty($headers)){
				$header = array_merge($header,$headers);
			}
			return $this->httpClient()->request('GET',$endpoint,[
				'headers'   => $header,
				'query'     => $params,
			]);
		}

		public function getJson($endpoint ,$params =[] ,$headers = [])
		{
			$header = $this->generateHeader();
			if (!empty($headers)){
				$header = array_merge($header,$headers);
			}
			return $this->httpClient()->request('GET',$endpoint,[
				'headers'   => $header,
				'json'      => $params,
				'query'     => $params,
			]);
		}

		public function postJson($endpoint, $params = [], $headers = [])
		{
			$header = $this->generateHeader();
			if (!empty($headers)){
				$header = array_merge($header,$headers);
			}
			return $this->httpClient()->request('POST', $endpoint, [
				'headers' => $header,
				'json'    => $params,
			]);
		}

		public function deleteJson($endpoint, $params = [], $headers = [])
		{

			$header = $this->generateHeader();
			if (!empty($headers)){
				$header = array_merge($header,$headers);
			}
			$options = [
				'form_params'=> $params,
				'headers' =>$header,
			];
			return $this->httpClient()->request('DELETE',$endpoint,$options);
		}

		public function post($endpoint, $params = [], $headers = [])
		{
			$header = $this->generateHeader();
			if (!empty($headers)){
				$header = array_merge($header,$headers);
			}
			return $this->httpClient()->request('POST', $endpoint, [
				'headers' => $header,
				'form_params' => $params,
				'debug'     => true
			]);
		}

		public function generateHeader($headers = []) : array
		{
			$accessToken = $this->getAccessToken();
			return [
				'Authorization'=>'Bearer '.$accessToken
			];
		}




	}