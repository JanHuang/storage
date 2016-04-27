<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/4/13
 * Time: 下午12:31
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

namespace FastD\Storage\SSDB;

use FastD\Storage\AbstractStorage;
use FastD\Storage\CacheInterface;

/**
 * Class Ssdb
 *
 * @package FastD\Storage\SSDB
 */
class Ssdb extends AbstractStorage implements CacheInterface
{
    /**
     * Ssdb constructor.
     * @param array|null $config
     */
    public function __construct(array $config = null)
    {
        static::$storage = new \SSDB();

        static::$storage->connect($config['host'], $config['port'] ?? 8888, $config['timeout'] ?? null);

        if (isset($config['auth'])) {
            static::$storage->auth($config['auth']);
        }
    }

    /**
     * @param array $config
     * @param bool $flag
     * @return \SSDB
     */
    public static function connect(array $config = null, $flag = false)
    {
        if (null === static::$storage || $flag) {
            $s = new static($config);
            unset($s);
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
        return static::$storage->exists($name);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function del($name)
    {
        return static::$storage->del($name);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function ttl($name)
    {
        return static::$storage->ttl($name);
    }

    /**
     * @param $name
     * @param $ttl
     * @return mixed
     */
    public function expire($name, $ttl)
    {
        return static::$storage->expire($name, $ttl);
    }

    /**
     * @return mixed
     */
    public function isHit()
    {
        return true;
    }
}