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

interface StorageInterface
{
    public function __construct(array $config = array());
}