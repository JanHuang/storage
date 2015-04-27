<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/4/27
 * Time: 下午9:26
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

namespace Dobee\Storage\Tests;

use Dobee\Storage\Memcached\Memcached;

class MemdTest extends \PHPUnit_Framework_TestCase
{
    private $mem;

    public function setUp()
    {
        $this->mem = new Memcached(array('host' => '11.11.11.11'));
    }

    public function testSet()
    {
        $this->mem->set('name', 'janhuang');
    }

    public function testGet()
    {
        $this->assertEquals('janhuang', $this->mem->get('name'));
    }
}