<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/4/13
 * Time: 上午11:58
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

namespace Dobee\Storage\Redis;

use Dobee\Storage\StorageInterface;

class Redis extends \Redis implements StorageInterface
{
    public function initialize(array $config = array())
    {
        $this->connect($config['host'], isset($config['port']) ? $config['port'] : 6379, isset($config['timeout']) ? $config['timeout'] : 5);
    }
}