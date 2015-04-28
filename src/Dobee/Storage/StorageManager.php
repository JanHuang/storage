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

namespace Dobee\Storage;

/**
 * Class StorageManager
 *
 * @package Dobee\Storage
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
        'redis'     => 'Dobee\\Storage\\Redis\\Redis',
        'memcache'  => 'Dobee\\Storage\\Memcache\\Memcache',
        'memcached' => 'Dobee\\Storage\\Memcached\\Memcached',
        'ssdb'      => 'Dobee\\Storage\\SSDB\\SSDB',
        'disque'    => 'Dobee\\Storage\\Disque\\Disque',
        'file'      => 'Dobee\\Storage\\File\\File',
        'apc'       => 'Dobee\\Storage\\APC\\Apc',
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