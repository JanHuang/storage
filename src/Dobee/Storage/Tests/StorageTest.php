<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/4/28
 * Time: 下午5:20
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

namespace Dobee\Storage\Tests;

use Dobee\Storage\StorageManager;

class StorageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Dobee\Storage\StorageManager
     */
    private $manager;

    public function setUp()
    {
        $this->manager = new StorageManager(array(
            'write' => [
                'type' => 'redis',
                'host' => '11.11.11.11',
                'port' => 6379
            ],
        ));
    }

    public function testGetSingleStorage()
    {
        $redis1 = $this->manager->getConnection('write');

        $redis2 = $this->manager->getConnection('write');

        $this->assertEquals($redis1, $redis2);
    }
}