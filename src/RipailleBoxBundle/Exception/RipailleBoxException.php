<?php

namespace RipailleBoxBundle\Exception;

/**
 * Class RipailleBoxException
 * @package RipailleBoxBundle\Exception
 */
class RipailleBoxException extends \Exception
{
    /**
     * RipailleBoxException constructor.
     * @param string $message
     * @param \Exception $previous
     */
    public function __construct($message, \Exception $previous)
    {
        parent::__construct($message, 0, $previous);
    }
}
