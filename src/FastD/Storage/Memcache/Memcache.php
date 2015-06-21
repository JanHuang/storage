<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/4/13
 * Time: 下午12:30
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

namespace FastD\Storage\Memcache;

use FastD\Storage\StorageInterface;

class Memcache extends \Memcache implements StorageInterface
{
    public function __construct(array $options = array())
    {
        $this->connect(
            isset($options['host']) ? $options['host'] : '127.0.0.1',
            isset($options['port']) ? $options['port'] : 11211
        );
    }
}