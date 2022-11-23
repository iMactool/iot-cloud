<?php
	declare(strict_types=1);

	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc:
	 *  ======================================================
	 */
	namespace Imactool\IotCloud\HikCloud;

	use Imactool\IotCloud\Config;
	use Imactool\IotCloud\Exception\InvalidArgumentException;
	use Imactool\IotCloud\HikCloud\Provider\AdProvider;
	use Imactool\IotCloud\HikCloud\Provider\AuthProvider;
	use Imactool\IotCloud\HikCloud\Provider\BuildingProvider;
	use Imactool\IotCloud\HikCloud\Provider\CommunitProvider;
	use Imactool\IotCloud\HikCloud\Provider\DeviceProvider;
	use Imactool\IotCloud\HikCloud\Provider\FaceDBProvider;
	use Imactool\IotCloud\HikCloud\Provider\MsgProvider;
	use Imactool\IotCloud\HikCloud\Provider\PersonProvider;
	use Imactool\IotCloud\HikCloud\Provider\PropertyProvider;

	/**
	 * Class Application
	 * @property AuthProvider       $auth
	 * @property DeviceProvider     $device
	 * @property CommunitProvider   $communit
	 * @property BuildingProvider   $building
	 * @property PersonProvider     $person
	 * @property PropertyProvider   $property
	 * @property AdProvider         $ad
	 * @property FaceDBProvider     $facedb
	 * @property MsgProvider        $msg
	 *
	 * @package Imactool\IotCloud\HikCloud
	 * @version 1.0.0
	 */
	class Application
	{
		protected array $alias = [
			'auth'      => AuthProvider::class,
			'device'    => DeviceProvider::class,
			'communit'  => CommunitProvider::class,
			'building'  => BuildingProvider::class,
			'person'    => PersonProvider::class,
			'property'  => PropertyProvider::class,
			'ad'        => AdProvider::class,
			'facedb'    => FaceDBProvider::class,
			'msg'       => MsgProvider::class,
		];

		protected array $providers = [];

		public function __construct (protected Config $config)
		{
		}

		public function __get($name)
		{
			if ( ! isset($name) || ! $this->alias[$name]){
				throw new InvalidArgumentException("{$name} is invalid.");
			}

			if (isset($this->providers[$name])){
				return $this->providers[$name];
			}

			$class = $this->alias[$name];
			return $this->providers[$name] = new $class($this,$this->config);
		}
	}