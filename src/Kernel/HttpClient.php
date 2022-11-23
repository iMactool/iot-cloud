<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: Http
	 *  ======================================================
	 */

	namespace Imactool\IotCloud\Kernel;

	use GuzzleHttp\Client;
	use Hyperf\Utils\Codec\Json;
	use Imactool\IotCloud\Exception\RequestException;
	use Psr\Http\Message\ResponseInterface;

	trait HttpClient
	{
		protected $guzzleOptions = [];
		protected ?string $baseUri = NULL;

		protected function getHttpClient() : Client
		{
			$this->guzzleOptions['base_uri'] = $this->baseUri;
			return new Client($this->guzzleOptions);
		}

		public function request($method, $endpoint, $options =[])
		{
			return $this->unwrapResponse($this->getHttpClient()->{$method}( $endpoint , $options));
		}

		/**
		 * 统一转换响应结果为 json 格式.
		 * @param $response
		 *
		 * @return mixed
		 * @author cc
		 */
		protected function unwrapResponse($response)
		{
			$contentType = $response->getHeaderLine('Content-Type');
			$contents = $response->getBody()->getContents();
			if (false !== stripos($contentType, 'json') || stripos($contentType, 'javascript')) {
				return \json_decode($contents, true);
			} elseif (false !== stripos($contentType, 'xml')) {
				return \json_decode(\json_encode(\simplexml_load_string($contents)), true);
			}

			return $contents;
		}

		public function setGuzzleOptions(array $options)
		{
			$this->guzzleOptions =  $options;
		}

		public function setBaseUri($uri)
		{
			$this->baseUri = trim($uri, '/');
			return $this;
		}

	}