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

use FastD\Storage\StorageInterface;

/**
 * Class Redis
 *
 * @package FastD\Storage\Redis
 */
class Redis implements StorageInterface
{
    /**
     * @var \Redis
     */
    protected $redis;

    /**
     * @param array $config
     */
    public function __construct(array $config = array())
    {
        $this->redis = new \Redis();

        $this->redis->connect($config['host'], $config['port'] ?? 6379, isset($config['timeout']) ? $config['timeout'] : 5);

        if (isset($config['auth'])) {
            $this->redis->auth($config['auth']);
        }

        unset($config);
    }

    /**
     * @param $name
     * @return bool
     */
    public function list($name)
    {
        return true;
    }

    /**
     * @param $name
     * @param $value
     * @return int
     */
    public function push($name, $value)
    {
        return $this->redis->lPush($name, $value);
    }

    /**
     * @param $name
     * @return string
     */
    public function pop($name)
    {
        return $this->redis->lPop($name);
    }

    /**
     * @param $name
     * @return int
     */
    public function length($name)
    {
        return $this->redis->lLen($name);
    }

    /**
     * @param $name
     * @param $start
     * @param $end
     * @return array
     */
    public function range($name, $start, $end)
    {
        return $this->redis->lRange($name, $start, $end);
    }

    /**
     * @param $name
     * @param $value
     * @return bool
     */
    public function set($name, $value)
    {
        return $this->redis->set($name, $value);
    }

    /**
     * @param $name
     * @return bool|string
     */
    public function get($name)
    {
        return $this->redis->get($name);
    }

    /**
     * @param $name
     * @return bool
     */
    public function has($name)
    {
        return $this->redis->exists($name);
    }

    /**
     * @param $name
     * @return int
     */
    public function del($name)
    {
        return $this->redis->del($name);
    }

    /**
     * @param $name
     * @return int
     */
    public function ttl($name)
    {
        return $this->redis->ttl($name);
    }

    /**
     * @param $name
     * @param $ttl
     * @return bool
     */
    public function expire($name, $ttl)
    {
        return $this->redis->expire($name, $ttl);
    }

    /**
     * @param $name
     * @return array
     */
    public function keys($name)
    {
        return $this->redis->keys($name);
    }

    /**
     * @return bool
     */
    public function isHit()
    {
        return true;
    }

    /**
     *
     */
    public function __destruct()
    {
        $this->redis = null;
    }
}