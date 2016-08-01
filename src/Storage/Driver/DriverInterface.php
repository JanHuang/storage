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
}