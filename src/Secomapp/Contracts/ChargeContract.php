<?php

namespace Secomapp\Contracts;

use Secomapp\Exceptions\ShopifyApiException;

interface ChargeContract
{
    /**
     * Create a new charge
     *
     * @param array $params
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function create($params);

    /**
     * Receive a single Charge
     *
     * @param string $id
     * @param string $fields comma-separated list of fields to include in the response
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function get($id, $fields = null);

    /**
     * Retrieve all charges
     *
     * @param array $params
     *
     * @return array
     * @throws ShopifyApiException
     */
    public function all($params = []);

    /**
     * Activate a charge
     *
     * @param string $id
     * @param array $params
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function activate($id, $params = []);

    /**
     * @param $status
     *
     * @return bool
     */
    public function activeStatus($status);
}
