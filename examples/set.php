<?php

/**
 *
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

use FastD\Storage\Cache;
use FastD\Storage\Driver\Redis\Redis;
use FastD\Storage\Storage;

include __DIR__ . '/../vendor/autoload.php';

$storage = new Storage(new Redis([
    'host' => '11.11.11.22',
    'port' => '6379',
]));

$storage->setCache(new Cache('name', 'janhuang'));

$cache = $storage->getCache('name');

echo $cache->getContent();
