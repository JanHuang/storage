<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 16-8-1 下午5:47
 */
namespace FastD\Storage;

class Cache implements CacheInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        // TODO: Implement getName() method.
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
}
