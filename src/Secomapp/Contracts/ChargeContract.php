<?php

namespace Secomapp\Contracts;

use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

interface ChargeContract
{
    /**
     * Create a new charge.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($params);

    /**
     * Receive a single Charge.
     *
     * @param string $id
     * @param string $fields comma-separated list of fields to include in the response
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function get($id, $fields = null);

    /**
     * Retrieve all charges.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($params = []);

    /**
     * Activate a charge.
     *
     * @param string $id
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function activate($id, $params = []);

    /**
     * @param $status
     *
     * @return bool
     */
    public function activeStatus($status);
}
