<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 16/4/27
 * Time: 下午5:24
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */

namespace FastD\Storage;

interface CacheInterface
{
    /**
     * @param $value
     * @param int $ttl
     * @return mixed
     */
    public function set($value, $ttl = 0);

    /**
     * @return mixed
     */
    public function get();

    /**
     * @param $name
     * @return mixed
     */
    public function del($name);

    /**
     * @param $name
     * @return mixed
     */
    public function ttl($name);

    /**
     * @param $name
     * @param $ttl
     * @return mixed
     */
    public function expire($name, $ttl);

    /**
     * @return mixed
     */
    public function isHit();
}