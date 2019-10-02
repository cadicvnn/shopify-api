<?php

namespace Secomapp\Exceptions;

use Exception;

class UnknownVersionException extends Exception
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
