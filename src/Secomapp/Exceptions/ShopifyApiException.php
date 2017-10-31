<?php

namespace Secomapp\Exceptions;


class ShopifyApiException extends \Exception
{
    /**
     * Create a new ShopifyApiException instance.
     *
     * @param string $message
     */
    function __construct($message)
    {
        $this->message = $message;
    }
}
