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
}