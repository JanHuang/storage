<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 16/5/11
 * Time: 下午1:24
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */

namespace FastD\Storage\Tests;

use FastD\Storage\Memcached\Memcached;
use FastD\Storage\Redis\Redis;
use FastD\Storage\Storage;

class StorageTest extends \PHPUnit_Framework_TestCase
{
    public function testStorageInstance()
    {
        $storage = new Storage([
            'read' => [
                'type' => 'redis',
                'host' => '11.11.11.44',
                'port' => 6379
            ],
            'mem' => [
                'type' => 'memcached',
                'host' => '11.11.11.44',
                'port' => 11211
            ],
        ]);

        $redis = $storage->getConnection('read');

        $this->assertInstanceOf(Redis::class, $redis);

        $mem = $storage->getConnection('mem');

        $this->assertInstanceOf(Memcached::class, $mem);
    }
}