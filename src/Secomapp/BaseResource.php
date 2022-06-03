<?php

namespace Secomapp;

use Secomapp\Contracts\ClientApiContract;

abstract class BaseResource
{
    /**
     * @var ClientApiContract
     */
    protected $client;

    /**
     * Resource constructor.
     *
     * @param ClientApiContract $client
     */
    public function __construct(ClientApiContract $client)
    {
        $this->client = $client;
    }

    /**
     * Prepare query string from an array of query parameters.
     * All entries of input equal to false (see converting to boolean) will be removed.
     *
     * @param mixed $varName
     * @param mixed $_       [optional]
     *
     * @return array
     */
    protected function prepareParams($varName, $_ = null)
    {
        if (!$varName) {
            $varName = [];
        }

        if (is_array($varName)) {
            return array_filter($varName);
        }

        if (version_compare(phpversion(), '8.0', '>=')) {
            $args = func_get_args();

            return !empty($args) && $args[0] ? array_filter(compact($args)) : [];
        }

        return array_filter(compact(func_get_args()));
    }
}
