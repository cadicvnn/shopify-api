<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Contracts\ChargeContract;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class ApplicationCharge extends BaseResource implements ChargeContract
{
    /**
     * Create a one-time application charge.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($params)
    {
        return $this->client->post('application_charges.json', 'application_charge', [
            'application_charge' => $params,
        ]);
    }

    /**
     * Receive a single ApplicationCharge.
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
        return $this->client->get("application_charges/{$id}.json", 'application_charge', $this->prepareParams($fields));
    }

    /**
     * Retrieve all one-time application charges.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($params = [])
    {
        return $this->client->get('application_charges.json', 'application_charge', $params);
    }

    /**
     * Retrieve all one-time application charges.
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
        return $this->client->post("application_charges/{$id}/activate.json", 'application_charge', [
            'application_charge' => ($params ?: ['id' => $id]),
        ]);
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
