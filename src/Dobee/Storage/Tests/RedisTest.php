<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/4/13
 * Time: 下午4:25
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

namespace Dobee\Storage\Tests;

use Dobee\Storage\Redis\Redis;

class RedisTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Redis
     */
    private $redis;

    public function setUp()
    {
        $this->redis = new Redis(array(
            'host' => '11.11.11.11',
            'port' => '6379',
        ));
    }

    public function testSet()
    {
        $this->redis->set('name', 'janhuang');
    }

    public function testGet()
    {
        $this->assertEquals('janhuang', $this->redis->get('name'));
    }
}