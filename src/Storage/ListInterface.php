<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 16/4/26
 * Time: 下午11:32
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */

namespace FastD\Storage;

/**
 * Interface ListInterface
 *
 * @package FastD\Storage
 */
interface ListInterface
{
    /**
     * @param $name
     * @return mixed
     */
    public function list($name);

    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    public function push($name, $value);

    /**
     * @param $name
     * @return mixed
     */
    public function pop($name);

    /**
     * @param $name
     * @return mixed
     */
    public function length($name);

    /**
     * @param $name
     * @param $start
     * @param $end
     * @return mixed
     */
    public function range($name, $start, $end);
}