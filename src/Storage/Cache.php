<?php

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

        $this->setContent($content, $dateTime);
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
     * @return bool
     */
    public function isHit()
    {
        return !empty($this->getContent());
    }
}
