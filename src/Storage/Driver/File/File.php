<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/4/13
 * Time: 下午12:36
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

namespace FastD\Storage\File;

use DateTime;
use FastD\Storage\Driver\StorageDriver;
use SplFileObject;

/**
 * Class File
 *
 * @package FastD\Storage\File
 */
class File extends StorageDriver
{
    /**
     * File constructor.
     * @param $file_name
     */
    public function __construct($file_name)
    {
        if (!file_exists(dirname($file_name))) {
            mkdir(dirname($file_name), 0755, true);
        }

        if (!file_exists($file_name)) {
            touch($file_name);
        }

        $this->driver = new SplFileObject($file_name);
    }

    /**
     * @param $name
     * @param $value
     * @param DateTime|null $ttl
     * @return mixed
     */
    public function set($name, $value, DateTime $ttl = null)
    {
        // TODO: Implement set() method.
    }

    /**
     * @param $name
     * @return mixed
     */
    public function persist($name)
    {
        // TODO: Implement persist() method.
    }

    /**
     * @param $name
     * @return mixed
     */
    public function get($name)
    {
        // TODO: Implement get() method.
    }

    /**
     * @param $name
     * @return mixed
     */
    public function del($name)
    {
        // TODO: Implement del() method.
    }

    /**
     * @param $name
     * @return mixed
     */
    public function has($name)
    {
        // TODO: Implement has() method.
    }

    /**
     * @param $name
     * @param DateTime|null $ttl
     * @return mixed
     */
    public function expire($name, DateTime $ttl)
    {
        // TODO: Implement expire() method.
    }
}