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

/**
 * Class AbstractStorage
 *
 * @package FastD\Storage
 */
class Storage implements StorageInterface
{
    const DEFAULT_DRIVER = 'redis';

    /**
     * @var mixed
     */
    protected static $storage;

    /**
     * @var CacheInterface[]
     */
    protected $caches = [];

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
     * @param array $config
     * @param bool $flag
     * @return static
     */
    public static function connect(array $config = null, $flag = false)
    {
        // TODO: Implement connect() method.
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