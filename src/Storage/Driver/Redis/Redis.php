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

namespace FastD\Storage\Driver\Redis;

use DateTime;
use FastD\Storage\Driver\StorageDriver;

/**
 * Class Redis
 *
 * @package FastD\Storage\Redis
 */
class Redis extends StorageDriver
{
    /**
     * Redis constructor.
     * @param array|null $config
     */
    public function __construct(array $config = [
        'host' => '127.0.0.1',
        'port' => '6379',
        'timeout' => 0.0
    ])
    {
        $this->driver = new \Redis();

        if (!$this->driver->connect($config['host'], $config['port'] ?? '6379', $config['timeout'] ?? 0.0)) {
            throw new \RuntimeException(sprintf('Host["%s"] is not connections.', $config['host'] . ':' . ($config['port'] ?? '6379')));
        }

        if (isset($config['auth'])) {
            $this->driver->auth($config['auth']);
        }
    }

    /**
     * @param $name
     * @param $value
     * @param DateTime|null $ttl
     * @return mixed
     */
    public function set($name, $value, DateTime $ttl = null)
    {
        $result = $this->driver->set($name, $value);

        if (null !== $ttl) {
            $this->expire($name, $ttl);
        }

        return $result;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function get($name)
    {
        return $this->driver->get($name);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function del($name)
    {
        return $this->driver->del($name);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function has($name)
    {
        return $this->driver->exists($name);
    }

    /**
     * @param $name
     * @param DateTime|null $ttl
     * @return mixed
     */
    public function expire($name, DateTime $ttl)
    {
        return $this->driver->expireAt($name, $ttl->getTimestamp());
    }

    /**
     * @param $name
     * @return mixed
     */
    public function persist($name)
    {
        return $this->driver->persist($name);
    }
}