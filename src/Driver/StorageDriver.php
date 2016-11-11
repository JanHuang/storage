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
     * @var static
     */
    protected static $storage;

    /**
     * @var mixed
     */
    protected $driver;

    /**
     * @param array $config
     * @param bool $flag
     * @return mixed
     */
    public static function connect(array $config = null, $flag = false)
    {
        if (null === static::$storage || $flag) {
            static::$storage = new static($config);
        }

        return static::$storage->getDriverInstance();
    }

    /**
     * @return mixed
     */
    public function getDriverInstance()
    {
        return $this->driver;
    }
}