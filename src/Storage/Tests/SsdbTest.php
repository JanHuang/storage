<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 16/4/27
 * Time: 下午10:14
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */

namespace FastD\Storage\Tests;

use FastD\Storage\SSDB\Ssdb;

class SsdbTest extends \PHPUnit_Framework_TestCase
{
    public function testSSDBInstance()
    {
        $ssdb = Ssdb::connect([
            'host' => '11.11.11.44',
            'port' => '8888'
        ]);

        $ssdb->set('name', 'jan');

        $this->assertEquals('jan', $ssdb->get('name'));
    }

    public function testCache()
    {
        $ssdb = new Ssdb([
            'host' => '11.11.11.44',
            'port' => '8888'
        ]);

        $ssdb->set('age', 18);

        $this->assertEquals(18, $ssdb->get('age'));
    }
}