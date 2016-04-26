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
    protected $redis;

    public function setUp()
    {
        $this->redis = new Redis([
            'host' => '11.11.11.44',
        ]);
    }

    public function testSetAndGet()
    {
        $this->redis->set('name', 'jan');
    }

    public function testGet()
    {
        $this->assertEquals('jan', $this->redis->get('name'));
    }
}