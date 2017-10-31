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
     * @param null $fields A comma-separated list of fields to return.
     *
     * @return array
     */
    protected function prepareFields($fields = null)
    {
        $params = [];
        if ($fields) {
            $params['fields'] = $fields;
        }

        return $params;
    }
}
