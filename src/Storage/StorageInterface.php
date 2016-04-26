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
interface StorageInterface extends ListInterface
{
    /**
     * StorageInterface constructor.
     * @param array $config
     */
    public function __construct(array $config = []);

    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    public function set($name, $value);

    /**
     * @param $name
     * @return mixed
     */
    public function get($name);

    /**
     * @param $name
     * @return mixed
     */
    public function has($name);

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
     * @param $name
     * @return mixed
     */
    public function keys($name);

    /**
     * @return mixed
     */
    public function isHit();
}