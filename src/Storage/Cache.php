<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 16-8-1 下午5:47
 */
namespace FastD\Storage;

class Cache implements CacheInterface
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $value
     * @param \DateTime $dateTime
     * @return mixed
     */
    public function setCache($value, \DateTime $dateTime)
    {
        // TODO: Implement setCache() method.
    }

    /**
     * @return mixed
     */
    public function getCache()
    {
        // TODO: Implement getCache() method.
    }

    /**
     * @param \DateTime $dateTime
     * @return $this
     */
    public function ttl(\DateTime $dateTime)
    {
        // TODO: Implement ttl() method.
    }

    /**
     * @param \DateTime $dateTime
     * @return $this
     */
    public function expire(\DateTime $dateTime)
    {
        // TODO: Implement expire() method.
    }

    /**
     * @return mixed
     */
    public function isHit()
    {
        // TODO: Implement isHit() method.
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
    }
}
