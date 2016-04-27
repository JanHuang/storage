<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 16/4/27
 * Time: 下午10:35
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */

namespace FastD\Storage\Tests;

use FastD\Storage\File\File;

class FileTest extends \PHPUnit_Framework_TestCase
{
    public function testCache()
    {
        $file = new File(__DIR__ . '/test.log');

        $file->set('janhuang');

        $this->assertEquals('janhuang', $file->get());
    }
}
