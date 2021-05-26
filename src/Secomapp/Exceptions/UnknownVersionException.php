<?php

namespace Secomapp\Exceptions;

use UnexpectedValueException;

class UnknownVersionException extends UnexpectedValueException
{
    /**
     * Create a new ShopifyApiException instance.
     *
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
