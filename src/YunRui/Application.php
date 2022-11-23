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
	namespace Imactool\IotCloud\YunRui;

	use Imactool\IotCloud\Config;
	use Imactool\IotCloud\Exception\InvalidArgumentException;
	use Imactool\IotCloud\YunRui\Provider\AccountProvider;
	use Imactool\IotCloud\YunRui\Provider\AscProvider;
	use Imactool\IotCloud\YunRui\Provider\AuthProvider;
	use Imactool\IotCloud\YunRui\Provider\BuildingProvider;
	use Imactool\IotCloud\YunRui\Provider\DeviceProvider;
	use Imactool\IotCloud\YunRui\Provider\LiveProvider;
	use Imactool\IotCloud\YunRui\Provider\MixedProvider;
	use Imactool\IotCloud\YunRui\Provider\MixProvider;
	use Imactool\IotCloud\YunRui\Provider\MsgProvider;
	use Imactool\IotCloud\YunRui\Provider\OrgProvider;
	use Imactool\IotCloud\YunRui\Provider\PersonProvider;

	/**
	 * Class Application
	 *
	 * @property AuthProvider   $auth
	 * @property DeviceProvider $device
	 * @property PersonProvider $person
	 * @property LiveProvider   $live
	 * @property MixedProvider  $mixed
	 * @property MixProvider    $mix
	 * @property AscProvider    $asc
	 * @property OrgProvider    $org
	 * @property MsgProvider    $msg
	 * @property BuildingProvider $building
	 * @property AccountProvider $account
	 *
	 * @package Imactool\IotCloud\YunRui
	 * @version 1.0.0
	 */
	class Application
	{

		protected array $alias = [
			'auth'      => AuthProvider::class,
			'device'    => DeviceProvider::class,
			'person'    => PersonProvider::class,
			'live'      => LiveProvider::class,
			'mixed'     => MixedProvider::class,
			'mix'       => MixedProvider::class,
			'asc'       => AscProvider::class,
			'org'       => OrgProvider::class,
			'msg'       => MsgProvider::class,
			'building'  => BuildingProvider::class,
			'account'   => AccountProvider::class
		];

		protected array $providers = [];

		public function __construct(protected Config $config)
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