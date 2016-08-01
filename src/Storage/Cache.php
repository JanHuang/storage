<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 16-8-1 下午5:47
 */
namespace FastD\Storage;

use DateTime;

/**
 * Class Cache
 *
 * @package FastD\Storage
 */
class Cache implements CacheInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var mixed
     */
    protected $content;

    /**
     * @var DateTime $expire
     */
    protected $expire;

    /**
     * Cache constructor.
     *
     * @param $name
     * @param $content
     * @param DateTime|null $dateTime
     */
    public function __construct($name, $content, DateTime $dateTime = null)
    {
        $this->name = $name;

        $this->setCache($content, $dateTime);
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
     * @param DateTime $dateTime
     * @return mixed
     */
    public function setContent($value, DateTime $dateTime = null)
    {
        $this->content = $value;

        return $this->expire($dateTime);
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param DateTime $dateTime
     * @return $this
     */
    public function expire(DateTime $dateTime = null)
    {
        $this->expire = $dateTime;

        return $this;
    }

    /**
     * @return mixed
     */
    public function isHit()
    {

    }
}
