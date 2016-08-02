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
    const OPEN_MODE = 'rw+';

    protected $path;

    /**
     * File constructor.
     *
     * @param string $path
     */
    public function __construct($path)
    {
        $this->targetDirectory($path);
    }

    /**
     * @param $path
     * @return bool
     */
    protected function targetDirectory($path)
    {
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $this->path = $path;

        return true;
    }

    /**
     * @param $name
     * @param $force
     * @return bool
     */
    protected function targetFile($name, $force = true)
    {
        $file = str_replace('//', '/', $this->path . DIRECTORY_SEPARATOR . $name);

        if (!file_exists($name) || $force) {
            $this->targetDirectory(dirname($file));
            touch($file);
        }

        return $file;
    }

    /**
     * @param $name
     * @return SplFileObject
     */
    protected function openCacheFile($name)
    {
        $cacheFile = $this->targetFile($name);

        $this->driver = new SplFileObject($cacheFile);

        return $this->driver;
    }

    /**
     * @param $name
     * @param $value
     * @param DateTime|null $ttl
     * @return mixed
     */
    public function set($name, $value, DateTime $ttl = null)
    {
        return $this->driver->fwrite($value);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function persist($name)
    {
        return true;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function get($name)
    {
        return $this->driver->fgetss();
    }

    /**
     * @param $name
     * @return mixed
     */
    public function del($name)
    {
        $file = $this->targetFile($name);

        unlink($file);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function has($name)
    {
        $file = $this->targetFile($name, false);

        return file_exists($file);
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