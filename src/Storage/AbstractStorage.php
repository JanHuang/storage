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
abstract class AbstractStorage implements StorageInterface
{
    /**
     * @var mixed
     */
    protected static $storage;

    protected $caches = [];

    /**
     * @param $name
     * @return mixed
     */
    public function getCache($name)
    {
        if (!$this->hasCache($name)) {
            throw new InvalidArgumentException($name);
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public function hasCache($name)
    {
        // TODO: Implement hasCache() method.
    }

    /**
     * @param $name
     * @param $content
     * @param \DateTime|null $dateTime
     * @return mixed
     */
    public function setCache($name, $content, \DateTime $dateTime = null)
    {
        // TODO: Implement setCache() method.
    }

    /**
     * @return mixed
     */
    public function clearCaches()
    {
        // TODO: Implement clearCaches() method.
    }

    /**
     * @param array $name
     * @return mixed
     */
    public function deleteCaches(array $name)
    {
        // TODO: Implement deleteCaches() method.
    }

    /**
     * @return mixed
     */
    public function persistCache()
    {
        // TODO: Implement persistCache() method.
    }
}