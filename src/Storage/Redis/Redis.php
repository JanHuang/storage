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

namespace FastD\Storage\Redis;

use FastD\Storage\AbstractStorage;
use FastD\Storage\CacheInterface;

/**
 * Class Redis
 *
 * @package FastD\Storage\Redis
 */
class Redis extends AbstractStorage
{
    /**
     * @var \Redis
     */
    protected static $storage;

    /**
     * Redis constructor.
     * @param array|null $config
     */
    public function __construct(array $config = null)
    {
        static::$storage = new \Redis();

        if (!static::$storage->connect($config['host'], $config['port'] ?? '6379', $config['timeout'] ?? 0.0)) {
            throw new \RuntimeException(sprintf('Host["%s"] is not connections.', $config['host'] . ':' . ($config['port'] ?? '6379')));
        }

        if (isset($config['auth'])) {
            static::$storage->auth($config['auth']);
        }
    }

    /**
     * @param array $config
     * @param bool $flag
     * @return \Redis
     */
    public static function connect(array $config = null, $flag = false)
    {
        if (null === static::$storage || $flag) {
            $redis = new static($config);
            unset($redis);
        }

        return static::$storage;
    }

    /**
     * @param $name
     * @param $value
     * @param int $ttl
     * @return mixed
     */
    public function set($name, $value, $ttl = 0)
    {
        $result = static::$storage->set($name, $value);

        if (!empty($ttl)) {
            static::$storage->expire($name, $ttl);
        }

        return $result;
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