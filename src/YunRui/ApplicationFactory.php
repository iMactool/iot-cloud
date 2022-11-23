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

	namespace Imactool\IotCloud\YunRui;

	use Hyperf\Contract\ConfigInterface;
	use Imactool\IotCloud\Config;
	use Psr\Container\ContainerInterface;

	class ApplicationFactory
	{
		public function __invoke (ContainerInterface $container)
		{
			$config = $container->get(ConfigInterface::class)->get('yunrui');
			return new Application(new Config($config));
		}
	}