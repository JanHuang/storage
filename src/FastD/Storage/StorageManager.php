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
        'redis'     => 'FastD\\Storage\\Redis\\Redis',
        'memcache'  => 'FastD\\Storage\\Memcache\\Memcache',
        'memcached' => 'FastD\\Storage\\Memcached\\Memcached',
        'ssdb'      => 'FastD\\Storage\\SSDB\\SSDB',
        'disque'    => 'FastD\\Storage\\Disque\\Disque',
        'file'      => 'FastD\\Storage\\File\\File',
        'apc'       => 'FastD\\Storage\\APC\\Apc',
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