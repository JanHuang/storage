<?php
/**
 *
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

use FastD\Storage\Driver\Redis\Redis;

include __DIR__ . '/../../vendor/autoload.php';

$redis = Redis::connect([
    'host' => '11.11.11.22',
    'port' => '6379',
]);

print_r($redis);

