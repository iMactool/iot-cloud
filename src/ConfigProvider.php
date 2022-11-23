<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Imactool\IotCloud;


class ConfigProvider
{
    public function __invoke(): array
    {
        return [
	        // 合并到  config/autoload/dependencies.php 文件
            'dependencies' => [
				\Imactool\IotCloud\HikCloud\Application::class      => \Imactool\IotCloud\HikCloud\ApplicationFactory::class,
				\Imactool\IotCloud\YunRui\Application::class        => \Imactool\IotCloud\YunRui\ApplicationFactory::class,
            ],
	        // 默认 Command 的定义，合并到 Hyperf\Contract\ConfigInterface 内，换个方式理解也就是与 config/autoload/commands.php 对应
            'commands' => [
            ],
	        // 合并到  config/autoload/annotations.php 文件
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
	        // 与 commands 类似
            'listeners' => [],
	        // 组件默认配置文件，即执行命令后会把 source 的对应的文件复制为 destination 对应的的文件
            'publish' => [
	            [
		            'id' => 'iotcloud',
		            'description' => '各种云平台协议，目前支持 海康、大华、乐橙.', // 描述
		            // 建议默认配置放在 publish 文件夹中，文件命名和组件名称相同
		            'source' => __DIR__ . '/../publish/iotcloud.php',  // 对应的配置文件路径
		            'destination' => BASE_PATH . '/config/autoload/iotcloud.php', // 复制为这个路径下的该文件
	            ],
            ],
        ];
    }
}
