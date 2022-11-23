# iot-cloud
## 集成海康云眸、萤石云、大华云睿、乐橙、海康ISC 、大华ICC 集于一体的 Hyperf 组件包

```
composer require imactool/iot-cloud  -vvv
```

## 使用

### 配置
```apacheconf
$config = [
	'hikcloud' => [ //海康云眸
		'client_id'     => '客户端ID',
		'client_secret' => '访问密钥'
	],
	'yunrui'=>[ //大华云睿
		'client_id'     => '平台的client_id',
		'client_secret' => '平台的client_secret'
	],
];
```

### 海康云眸
```php

require __DIR__ .'/vendor/autoload.php';

use Imactool\IotCloud\Config as MyConfig;
use Imactool\IotCloud\HikCloud\Application;

$config = \config('iotcloud');
$application = new Application(new MyConfig($config));
$params = [
'communityName' => 'xxx',
'provinceCode'  => 'xxf',
'addressDetail' => 'rgg'
];
$application->communit->communities($params);
```

### 大华云睿

```php

require __DIR__ .'/vendor/autoload.php';

use Imactool\IotCloud\Config as MyConfig;
use Imactool\IotCloud\YunRui\Application;

$config = \config('iotcloud');
$application = new Application(new MyConfig($config));
$application->account->addUser();

```
## TODO 

- [ ] 萤石云
- [ ] 乐橙
- [ ] 海康ISC
- [ ] 大华ICC


### 相关文档
- [海康云眸 企业内部应用开发-社区](https://pic.hik-cloud.com/opencustom/apidoc/online/neptune/4cb4c4f2147e4624bc29408ac70e92c4.html?timestamp=1653966047558)
- [大华云睿开放平台的文档](https://www.cloud-dahua.com/wiki)
- [乐橙开放平台开发文档 ](https://open.imou.com/book/start.html)
- [萤石开放平台介绍文档](https://open.ys7.com/doc/zh/book/index/user.html)
- [海康综合安防管理平台（iSecure Center）](https://open.hikvision.com/docs/docId?productId=5c67f1e2f05948198c909700&version=%2F9e6b1870e25348608d01b5669a7f3595&curNodeId=a23956fcc1c64d6ab5cf9b79d4e0d3be)
- [大华 智能物联综合管理平台 ICC](https://open-icc.dahuatech.com/#/)