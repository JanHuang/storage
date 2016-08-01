<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 16/4/27
 * Time: 下午12:09
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */

namespace FastD\Storage;

use FastD\Storage\Driver\DriverInterface;

/**
 * Class Storage
 *
 * @package FastD\Storage
 */
class Storage implements StorageInterface
{
    /**
     * @var CacheInterface[]
     */
    protected $caches = [];

    /**
     * @var DriverInterface
     */
    protected $driver;

    /**
     * Storage constructor.
     *
     * @param DriverInterface $driver
     */
    public function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * @param $name
     * @return CacheInterface
     * @throws InvalidArgumentException
     */
    public function getCache($name)
    {
        if (!$this->hasCache($name)) {
            throw new InvalidArgumentException($name);
        }

        return $this->caches[$name];
    }

    /**
     * @param $name
     * @return bool
     */
    public function hasCache($name)
    {
        return isset($this->caches[$name]);
    }

    /**
     * @param CacheInterface $cache
     * @return $this
     */
    public function setCache(CacheInterface $cache)
    {
        $this->caches[$cache->getName()] = $cache;

        return $this;
    }

    /**
     * @param CacheInterface $cache
     * @return $this
     */
    public function persistCache(CacheInterface $cache)
    {
        $this->caches[$cache->getName()] = $cache;

        return $this;
    }

    /**
     * @return bool
     */
    public function clearCaches()
    {
        // TODO: Implement clearCaches() method.
    }

    /**
     * @param array $name
     * @return bool
     */
    public function deleteCaches(array $name)
    {
        // TODO: Implement deleteCaches() method.
    }
}