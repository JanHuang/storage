# Storage

![Building](https://api.travis-ci.org/JanHuang/storage.svg?branch=master)
[![Latest Stable Version](https://poser.pugx.org/fastd/storage/v/stable)](https://packagist.org/packages/fastd/storage) [![Total Downloads](https://poser.pugx.org/fastd/storage/downloads)](https://packagist.org/packages/fastd/storage) [![Latest Unstable Version](https://poser.pugx.org/fastd/storage/v/unstable)](https://packagist.org/packages/fastd/storage) [![License](https://poser.pugx.org/fastd/storage/license)](https://packagist.org/packages/fastd/storage)

简单的 PHP 存储类组件，支持原生 Memcached, Redis, SSDB 等操作。

## 要求

* PHP 7+

## Composer

```json
{
    "fastd/storage": "2.0.x-dev"
}
```

## 扩展

* Redis [https://github.com/owlient/phpredis](https://github.com/owlient/phpredis)
* Memcached [https://github.com/php-memcached-dev/php-memcached](https://github.com/php-memcached-dev/php-memcached)
* SSDB [https://github.com/jonnywang/phpssdb](https://github.com/jonnywang/phpssdb)

## 使用

都是简单的封装，实现统一一套 API，统一入口和基础 key/value 存储操作


### 文件缓存

文件缓存此处仅使用最简单的 `\SplFileObject` 进行扩展，因为文件缓存样式以及支持的存储类型不是太过于丰富，所以此处仅作为最简单的 key/value 方式进行存储。

```php
$file = new File(__DIR__ . '/test.log');

$file->set('janhuang');

$content = $file->get();
```

通过 `set` 方法存储内容， 通过 `get` 方法获取存储的内容，具体操作请看 `\SplFileObject`，文件存储对象继承于 `SplFileObject`

### Redis

```php
use FastD\Storage\Redis\Redis;

$redis = new Redis([
    'host' => '',
    'port' => '',
    'auth' => ''
]);

$redis->set($name, $value, $ttl = 0);

$redis->get($name);
```

获取 Redis 与原生对象，保持使用上的灵活。


```php
use FastD\Storage\Redis\Redis;

$redis = Redis::connect([
    'host' => '',
    'port' => '',
    'auth' => ''
]);

// 原生 redis 操作

$redis->mset($name, $value);
```

`Redis::connection(array $config): \Redis` 返回一个原生操作的扩展对象，可以然你按照原生的方式操作。

### Memcached

```php
use FastD\Storage\Memcached\Memcached;

$memcached = new Memcached([
    'host' => '',
    'port' => ''
]);

$memcached->set('age', '18');
```

原生操作

```php
use FastD\Storage\Memcached\Memcached;

$memcached = Memcached::connect([
    'host' => '',
    'port' => ''
]);
```

### SSDB

```php
use FastD\Storage\Ssdb\Ssdb;

$ssdb = new Ssdb([
    'host' => '',
    'port' => ''
]);
```

原生操作

```php
use FastD\Storage\Ssdb\Ssdb;

$ssdb = Ssdb::connect([
    'host' => '',
    'port' => ''
]);
```

### 友情提示

所有缓存操作都实现 `FastD\Storage\CacheInterface` 接口，所以缓存操作保持一致，**注意各个存储得兼容方式。** 均使用 `new` 进行实例化。

而原生操作均使用 `FastD\Storage\StorageInterface::connect(array $config)` 静态方法进行获取，文件存储较为特殊，只有 `open` 方法。

**友谊得小船不能说翻就翻**

## Testing

```php
phpunit
```

## License MIT
