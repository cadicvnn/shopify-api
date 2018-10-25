<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class CustomerAddress extends BaseResource
{
    /**
     * Retrieves a list of addresses for a customer.
     *
     * @param string $customerId
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($customerId, $params = [])
    {
        return $this->client->get("customers/{$customerId}/addresses.json", 'addresses', $params);
    }

    /**
     * Retrieves details a single customer address.
     *
     * @param string $customerId
     * @param string $id
     * @param string $fields
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function get($customerId, $id, $fields = null)
    {
        return $this->client->get("customers/{$customerId}/addresses/{$id}.json", 'customer_address', $this->prepareParams($fields));
    }

    /**
     * Creates a new address for a customer.
     *
     * @param string $customerId
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($customerId, $params)
    {
        return $this->client->post("customers/{$customerId}/addresses.json", 'customer_address', [
            'address' => $params,
        ]);
    }

    /**
     * Updates an existing customer address.
     *
     * @param string $customerId
     * @param string $id
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function update($customerId, $id, $params)
    {
        return $this->client->put("customers/{$customerId}/addresses/{$id}.json", 'customer_address', [
            'address' => $params,
        ]);
    }

    /**
     * Removes an address from a customer’s address list.
     *
     * @param string $customerId
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function delete($customerId, $id)
    {
        $this->client->delete("customers/{$customerId}/addresses/{$id}.json");
    }

    /**
     * Removes an address from a customer’s address list.
     *
     * @param string $customerId
     * @param array  $ids
     *
     * @throws ShopifyApiException
     */
    public function bulkDelete($customerId, $ids)
    {
        $url = "customers/{$customerId}/addresses/set.json?operation=destroy";
        foreach ($ids as $id) {
            $url = "{$url}&address_ids[]={$id}";
        }
        $this->client->put($url);
    }

    /**
     * Updates an existing customer address.
     *
     * @param string $customerId
     * @param string $id
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function setDefault($customerId, $id)
    {
        return $this->client->put("customers/{$customerId}/addresses/{$id}/default.json", 'customer_address');
    }
}
