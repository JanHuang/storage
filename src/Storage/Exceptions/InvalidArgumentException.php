<?php

namespace FastD\Storage\Exceptions;

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
