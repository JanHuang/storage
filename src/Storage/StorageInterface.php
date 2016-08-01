<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/4/13
 * Time: 下午4:17
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

namespace FastD\Storage;

/**
 * Interface StorageInterface
 *
 * @package FastD\Storage
 */
interface StorageInterface
{
    /**
     * @param array $config
     * @param bool $flag
     * @return static
     */
    public static function connect(array $config = null, $flag = false);

    /**
     * @param $name
     * @return CacheInterface
     */
    public function getCache($name);

    /**
     * @param $name
     * @return bool
     */
    public function hasCache($name);

    /**
     * @param CacheInterface $cache
     * @return $this
     */
    public function setCache(CacheInterface $cache);

    /**
     * @param CacheInterface $cache
     * @return $this
     */
    public function persistCache(CacheInterface $cache);

    /**
     * @return bool
     */
    public function clearCaches();

    /**
     * @param array $name
     * @return bool
     */
    public function deleteCaches(array $name);
}