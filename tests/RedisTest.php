<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 16/4/26
 * Time: 下午11:54
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */

namespace FastD\Storage\Tests;

use FastD\Storage\Redis\Redis;

class RedisTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Redis
     */
    protected $storage;

    const CONFIG = [
        'host' => '11.11.11.44',
        'port' => 6379
    ];

    public function setUp()
    {
        $this->storage = new Redis(self::CONFIG);
    }

    public function testRedisInstance()
    {
        $redis = Redis::connect(self::CONFIG);

        $this->assertInstanceOf('\Redis', $redis);

        $redis->set('name', 'janhuang');

        $this->assertEquals('janhuang', $redis->get('name'));
    }

    public function testCache()
    {
        $this->storage->set('name', 'jan');
    }

    public function testCacheGet()
    {
        $this->assertEquals('jan', $this->storage->get('name'));
    }
}