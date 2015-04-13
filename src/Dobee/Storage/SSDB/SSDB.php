<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/4/13
 * Time: 下午12:31
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

namespace Dobee\Storage\SSDB;

use Dobee\Storage\StorageInterface;

if (!class_exists('SimpleSSDB')) {
    include __DIR__ . '/SimpleSSDB.php';
}

class SSDB extends \SimpleSSDB implements StorageInterface
{
    public function initialize(array $config = array())
    {
        // TODO: Implement initializeConnect() method.
    }
}