<?php
/**
 *
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace FastD\Storage\Driver;

/**
 * Class StorageDriver
 *
 * @package FastD\Storage\Driver
 */
abstract class StorageDriver implements DriverInterface
{
    /**
     * @var mixed
     */
    protected static $storage;

    /**
     * @param array $config
     * @param bool $flag
     * @return static
     */
    public static function connect(array $config = null, $flag = false)
    {
        if (null === static::$storage || $flag) {
            $storage = new static($config);
            static::$storage = $storage;
            unset($storage);
        }

        return static::$storage;
    }
}