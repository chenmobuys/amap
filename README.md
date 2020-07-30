## ChenAmap

[![Travis CI Status](https://api.travis-ci.org/chenmobuys/amap.svg)](https://travis-ci.org/github/chenmobuys/amap)
[![Latest Stable Version](https://poser.pugx.org/chen/amap/v/stable.svg)](https://packagist.org/packages/chen/amap) 
[![Latest Unstable Version](https://poser.pugx.org/chen/amap/v/unstable.svg)](https://packagist.org/packages/chen/amap)
[![Total Downloads](https://poser.pugx.org/chen/amap/downloads)](https://packagist.org/packages/chen/amap) 
[![License](https://poser.pugx.org/chen/amap/license)](https://packagist.org/packages/chen/amap) 

## 环境

1. PHP >= 5.6
2. [Composer](https://getcomposer.org/)

## 安装
```bash
composer require "chen/amap:^0.1" -vvv
```

## 用法
基本使用

```php
<?php

use Chen\Amap\Factory;

$config = ['key' => 'xxxxxxxxxxxxxxxxxxxxx'];

// Web服务
$webservice = Factory::webservice($config);

// 调用 `地理/逆地理编码` 接口
$response = $webservice->geocode->geo('北京市');
$response = $webservice->geocode->regeo('116.322056,39.89491');

// 猎鹰服务
$track = Factoy::track($config);

// ... 接口具体用法，查看官方文档
```

## 官方文档地址

[Web服务文档地址](https://lbs.amap.com/api/webservice)
[猎鹰服务文档地址](https://lbs.amap.com/api/track)
