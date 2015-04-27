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

namespace Dobee\Storage\Memcache;

use Dobee\Storage\StorageInterface;

class Memcache extends \Memcached implements StorageInterface
{
    public function __construct(array $options = array())
    {
        parent::__construct(isset($options['persistent_id']) ? $options['persistent_id'] : '');
    }
}