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

use FastD\Storage\AbstractStorage;
use FastD\Storage\CacheInterface;

/**
 * Class Memcached
 *
 * @package FastD\Storage\Memcached
 */
class Memcached extends AbstractStorage implements CacheInterface
{
    /**
     * @var \Memcached
     */
    protected static $storage;

    /**
     * Memcached constructor.
     * @param array|null $config
     */
    public function __construct(array $config = null)
    {
        static::$storage = new \Memcached();
        static::$storage->addServer($config['host'], $config['port'] ?? 11211, $config['timeout'] ?? 100);
    }

    /**
     * @param array|null $config
     * @param bool $flag
     * @return \Memcached
     */
    public static function connect(array $config = null, $flag = false)
    {
        if (null === static::$storage || $flag) {
            $m = new static($config);
            unset($m);
        }

        return static::$storage;
    }

    /**
     * @param $name
     * @param $value
     * @param int $ttl
     * @return mixed
     */
    public function set($name, $value, $ttl = null)
    {
        print_r(static::$storage);
        return static::$storage->set($name, $value, $ttl);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function get($name)
    {
        return static::$storage->get($name);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function has($name)
    {
        return $this->get($name);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function del($name)
    {
        return static::$storage->delete($name);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function ttl($name)
    {
        return true;
    }

    /**
     * @param $name
     * @param $ttl
     * @return mixed
     */
    public function expire($name, $ttl)
    {
        return true;
    }

    /**
     * @return mixed
     */
    public function isHit()
    {
        return true;
    }
}