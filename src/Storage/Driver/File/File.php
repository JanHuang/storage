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

namespace FastD\Storage\Driver\File;

use DateTime;
use FastD\Storage\Driver\StorageDriver;

/**
 * Class File
 *
 * @package FastD\Storage\File
 */
class File extends StorageDriver
{
    const OPEN_MODE = 'rw+';

    /**
     * @var string
     */
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
        $file = str_replace('//', '/', $this->path . DIRECTORY_SEPARATOR . $name) . '.cache';

        if (!file_exists($name) || $force) {
            $this->targetDirectory(dirname($file));
            touch($file);
        }

        return $file;
    }

    /**
     * @param $name
     * @param $value
     * @param DateTime|null $ttl
     * @return mixed
     */
    public function set($name, $value, DateTime $ttl = null)
    {
        $file = $this->targetFile($name);

        if (null !== $ttl) {
            $this->expire($name, $ttl);
        }

        return file_put_contents($file, $value);
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
        return file_get_contents($this->targetFile($name));
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
        return true;
    }
}