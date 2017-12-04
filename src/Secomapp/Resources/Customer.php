<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;

class Customer extends BaseResource
{
    /**
     * Receive a list of all Customers
     *
     * @param $params
     *
     * @return array
     * @throws ShopifyApiException
     */
    public function all($params = [])
    {
        return $this->client->get('customers.json', 'customers', $params);
    }

    /**
     * Search for customers matching supplied query
     *
     * @param $query
     * @param $params
     *
     * @return array
     * @throws ShopifyApiException
     */
    public function search($query, $params = [])
    {
        return $this->client->get("customers/search.json?query={$query}", 'customers', $params);
    }

    /**
     * Receive a single Customer
     *
     * @param $id
     * @param string $fields
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function get($id, $fields = null)
    {
        return $this->client->get("customers/{$id}.json", 'customer', $this->prepareParams($fields));
    }

    /**
     * Create a new Customer
     *
     * @param array $params
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function create($params)
    {
        return $this->client->post('customers.json', 'customer', [
            'customer' => $params
        ]);
    }

    /**
     * Modify an existing Customer
     *
     * @param string $id
     * @param array $params
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function update($id, $params)
    {
        return $this->client->put("customers/{$id}.json", 'customer', [
            'customer' => $params,
        ]);
    }

    /**
     * Create account activation URL
     *
     * @param string $id
     *
     * @return string
     * @throws ShopifyApiException
     */
    public function createAccountActivationUrl($id)
    {
        return $this->client->post("customers/{$id}/account_activation_url.json", 'account_activation_url');
    }

    /**
     * Send an invite
     *
     * @param string $id
     * @param array $params
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function sendInvite($id, $params = [])
    {
        return $this->client->post("customers/{$id}/send_invite.json", 'customer_invite', $params);
    }

    /**
     * Remove a Customer from the database
     *
     * @param $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("customers/{$id}.json");
    }

    /**
     * Receive a count of all Customers
     *
     * @return integer
     * @throws ShopifyApiException
     */
    public function count()
    {
        return $this->client->get('customers/count.json', 'count');
    }

    /**
     * Find orders belonging to this customer
     *
     * @param $id
     *
     * @return array
     * @throws ShopifyApiException
     */
    public function orders($id)
    {
        return $this->client->get("customers/{$id}/orders.json", 'orders');
    }
}
