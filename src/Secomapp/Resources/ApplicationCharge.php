<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Contracts\ChargeContract;
use Secomapp\Exceptions\ShopifyApiException;

class ApplicationCharge extends BaseResource implements ChargeContract
{
    /**
     * Create a new one-time application charge
     *
     * @param array $params
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function create($params)
    {
        return $this->client->post('application_charges.json', 'application_charges', [
            'application_charge' => $params,
        ]);
    }

    /**
     * Receive a single ApplicationCharge
     *
     * @param string $id
     * @param string $fields comma-separated list of fields to include in the response
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function get($id, $fields = null)
    {
        return $this->client->get("application_charges/{$id}.json", 'application_charges', $this->prepareParams($fields));
    }

    /**
     * Retrieve all one-time application charges
     *
     * @param array $params
     *
     * @return array
     * @throws ShopifyApiException
     */
    public function all($params = [])
    {
        return $this->client->get("application_charges.json", 'application_charges', $params);
    }

    /**
     * Activate a one-time application charge
     *
     * @param string $id
     * @param array $params
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function activate($id, $params = [])
    {
        return $this->client->post("application_charges/{$id}/activate.json", 'application_charge', [
            'application_charge' => ($params ?: ['id' => $id]),
        ]);
    }

    /**
     * Cancel a recurring application charge
     *
     * @param $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("application_charges/{$id}.json");
    }

    /**
     * Customize a recurring application charge
     *
     * @param string $id
     * @param integer $amount
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function customize($id, $amount)
    {
        return $this->client->put("application_charges/{$id}/customize.json?recurring_application_charge[capped_amount]={$amount}", 'application_charge');
    }

    /**
     * @param $status
     *
     * @return bool
     */
    public function activeStatus($status)
    {
        return in_array($status, ['accepted', 'active']);
    }
}
