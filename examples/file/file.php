<?php
/**
 *
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

use FastD\Storage\Driver\File\File;

include __DIR__ . '/../../vendor/autoload.php';

$file = new File(__DIR__);

$file->set('name', 'janhuang');

echo $file->get('name');
