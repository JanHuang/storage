<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/4/28
 * Time: 下午5:02
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

namespace FastD\Storage;

use FastD\Storage\Memcached\Memcached;
use FastD\Storage\Redis\Redis;
use FastD\Storage\SSDB\Ssdb;

/**
 * Class StorageManager
 *
 * @package FastD\Storage
 */
class StorageManager
{
    /**
     * @var array
     */
    private $storage = array();

    /**
     * @var array
     */
    private $maps = array(
        'redis'     => Redis::class,
        'memcached' => Memcached::class,
        'ssdb'      => Ssdb::class,
    );

    /**
     * @var array
     */
    private $config;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param $connection
     * @return StorageInterface
     */
    public function getConnection($connection)
    {
        if (isset($this->storage[$connection])) {
            return $this->storage[$connection];
        }
        
        $config = $this->config[$connection];

        $this->storage[$connection] = new $this->maps[$config['type']]($config);

        return $this->storage[$connection];
    }
}