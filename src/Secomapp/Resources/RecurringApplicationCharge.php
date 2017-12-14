<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Contracts\ChargeContract;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class RecurringApplicationCharge extends BaseResource implements ChargeContract
{
    /**
     * Create a new recurring application charge.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($params)
    {
        return $this->client->post('recurring_application_charges.json', 'recurring_application_charge', [
            'recurring_application_charge' => $params,
        ]);
    }

    /**
     * Receive a single RecurringApplicationCharge.
     *
     * @param string $id
     * @param string $fields comma-separated list of fields to include in the response
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function get($id, $fields = null)
    {
        return $this->client->get("recurring_application_charges/{$id}.json", 'recurring_application_charge', $this->prepareParams($fields));
    }

    /**
     * Retrieve all recurring application charges.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($params = [])
    {
        return $this->client->get('recurring_application_charges.json', 'recurring_application_charges', $params);
    }

    /**
     * Activate a recurring application charge.
     *
     * @param string $id
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function activate($id, $params = [])
    {
        return $this->client->post("recurring_application_charges/{$id}/activate.json", 'recurring_application_charge', [
            'recurring_application_charge' => ($params ?: ['id' => $id]),
        ]);
    }

    /**
     * Cancel a recurring application charge.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("recurring_application_charges/{$id}.json");
    }

    /**
     * Customize a recurring application charge.
     *
     * @param string $id
     * @param int    $amount
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function customize($id, $amount)
    {
        return $this->client->put("recurring_application_charges/{$id}/customize.json?recurring_application_charge[capped_amount]={$amount}", 'recurring_application_charge');
    }

    /**
     * @param string $status
     *
     * @return bool
     */
    public function activeStatus($status)
    {
        return in_array($status, ['accepted', 'active']);
    }
}
