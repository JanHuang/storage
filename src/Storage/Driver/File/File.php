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

use FastD\Storage\CacheInterface;

/**
 * Class File
 *
 * @package FastD\Storage\File
 */
class File extends \SplFileObject implements CacheInterface
{
    /**
     * @var File
     */
    protected static $storage;

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

        parent::__construct($file_name, 'rw+');
    }

    /**
     * @param $content
     * @param null $context
     * @param int $ttl
     * @return int
     */
    public function set($content, $context = null, $ttl = 0)
    {
        return file_put_contents($this->getPathname(), $content);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function get($name = null)
    {
        return file_get_contents($this->getPathname());
    }

    /**
     * @deprecated
     *
     * @param $name
     * @return mixed
     */
    public function has($name)
    {
        return true;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function del($name)
    {
        return unlink($this->getFilename());
    }

    /**
     * @param $name
     * @return mixed
     */
    public function ttl($name)
    {
        return true;
    }

    /**
     * @param $name
     * @param $ttl
     * @return mixed
     */
    public function expire($name, $ttl)
    {
        return true;
    }

    /**
     * @return mixed
     */
    public function isHit()
    {
        return true;
    }

    /**
     * @param array $config
     * @param bool $flag
     * @return mixed
     */
    public static function connect(array $config = null, $flag = false)
    {
        return static::open($config['file'], $config['mode'] ?? 'rw', $flag);
    }

    /**
     * @param $file
     * @param string $mode
     * @param bool $flag
     * @return File
     */
    public static function open($file, $mode = 'rw', $flag = false)
    {
        if (null === static::$storage || $flag) {
            static::$storage = new static($file, $mode);
        }

        return static::$storage;
    }
}