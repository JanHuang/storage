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

use DateTime;

/**
 * Interface CacheInterface
 * @package FastD\Storage
 */
interface CacheInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param $value
     * @param DateTime $dateTime
     * @return mixed
     */
    public function setContent($value, DateTime $dateTime);

    /**
     * @return mixed
     */
    public function getContent();

    /**
     * @param DateTime $dateTime
     * @return $this
     */
    public function expire(DateTime $dateTime);

    /**
     * @return mixed
     */
    public function isHit();
}