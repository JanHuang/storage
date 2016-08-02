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
     * @var null|string
     */
    protected $prefix;

    /**
     * Storage constructor.
     *
     * @param DriverInterface $driver
     * @param string|null $prefix
     */
    public function __construct(DriverInterface $driver, $prefix = null)
    {
        $this->driver = $driver;

        $this->prefix = $prefix;
    }

    /**
     * @param $name
     * @return CacheInterface
     * @throws InvalidArgumentException
     */
    public function getCache($name)
    {
        if ($this->driver->has($name)) {
            $this->caches[$name] = new Cache($name, $this->driver->get($name));
        }

        if ($this->hasCache($name)) {
            return $this->caches[$name];
        }

        throw new InvalidArgumentException($name);
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

        $this->driver->set($cache->getName(), $cache->getContent());

        return $this;
    }

    /**
     * @param CacheInterface $cache
     * @return $this
     */
    public function persistCache(CacheInterface $cache)
    {
        $this->caches[$cache->getName()] = $cache;

        $this->driver->persist($cache->getName());

        return $this;
    }

    /**
     * @return bool
     */
    public function clearCaches()
    {
        foreach ($this->caches as $cache) {
            $this->deleteCaches([$cache->getName()]);
        }
    }

    /**
     * @param array $caches
     * @return bool
     */
    public function deleteCaches(array $caches)
    {
        foreach ($caches as $cache) {
            if ($this->driver->del($cache)) {
                unset($this->caches[$cache]);
            }
        }
    }
}