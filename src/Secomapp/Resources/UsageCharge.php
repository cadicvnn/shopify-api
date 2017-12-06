<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class UsageCharge extends BaseResource
{
    /**
     * Create a usage charge.
     *
     * @param string $recurringChargeId
     * @param int    $price
     * @param string $description
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($recurringChargeId, $price, $description)
    {
        return $this->client->post("recurring_application_charges/{$recurringChargeId}/usage_charges.json", 'usage_charge', [
            'usage_charge' => [
                'description' => $description,
                'price'       => $price,
            ],
        ]);
    }

    /**
     * Receive a single UsageCharge.
     *
     * @param string $recurringChargeId
     * @param string $id
     * @param string $fields            comma-separated list of fields to include in the response
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function get($recurringChargeId, $id, $fields = null)
    {
        return $this->client->get("recurring_application_charges/{$recurringChargeId}/usage_charges/{$id}.json", 'usage_charge', $this->prepareParams($fields));
    }

    /**
     * Retrieve all usage charges.
     *
     * @param string $recurringChargeId
     * @param string $fields            comma-separated list of fields to include in the response
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($recurringChargeId, $fields = null)
    {
        return $this->client->get("recurring_application_charges/{$recurringChargeId}/usage_charges.json", 'usage_charges', $this->prepareParams($fields));
    }
}
