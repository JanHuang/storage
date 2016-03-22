<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/4/27
 * Time: 下午6:40
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

namespace FastD\Storage\Memcached;

use FastD\Storage\StorageInterface;

class Memcached extends \Memcached implements StorageInterface
{
    public function __construct(array $options = array())
    {
        parent::__construct(isset($options['persistent_id']) ? $options['persistent_id'] : '');

        if (isset($options['options']) && is_array($options['options'])) {
            $this->setOptions($options['options']);
        }

        $this->addServer(
            isset($options['host']) ? $options['host'] : '127.0.0.1',
            isset($options['port']) ? $options['port'] : 11211
        );
    }
}