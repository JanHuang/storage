<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 16-8-1 下午5:34
 */
namespace FastD\Storage;

use Exception;

/**
 * Class InvalidArgumentException
 * @package FastD\Storage
 */
class InvalidArgumentException extends Exception
{
    /**
     * InvalidArgumentException constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct(sprintf('Cache ["%s"] is undefined.', $name), 4000);
    }
}
