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

use DateTime;

/**
 * Interface DriverInterface
 *
 * @package FastD\Storage\Driver
 */
interface DriverInterface
{
    /**
     * @param array $config
     * @param bool $flag
     * @return static
     */
    public static function connect(array $config = null, $flag = false);

    /**
     * @param $name
     * @param $value
     * @param DateTime|null $ttl
     * @return mixed
     */
    public function set($name, $value, DateTime $ttl = null);

    /**
     * @param $name
     * @return mixed
     */
    public function persist($name);

    /**
     * @param $name
     * @return mixed
     */
    public function get($name);

    /**
     * @param $name
     * @return mixed
     */
    public function del($name);

    /**
     * @param $name
     * @return mixed
     */
    public function has($name);

    /**
     * @param $name
     * @param DateTime|null $ttl
     * @return mixed
     */
    public function expire($name, DateTime $ttl);
}