<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class Customer extends BaseResource
{
    /**
     * Receive a list of all Customers.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($params = [])
    {
        return $this->client->get('customers.json', 'customers', $params);
    }

    /**
     * Search for customers matching supplied query.
     *
     * @param string $query
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function search($query, $params = [])
    {
        return $this->client->get("customers/search.json?query={$query}", 'customers', $params);
    }

    /**
     * Receive a single Customer.
     *
     * @param string $id
     * @param string $fields
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function get($id, $fields = null)
    {
        return $this->client->get("customers/{$id}.json", 'customer', $this->prepareParams($fields));
    }

    /**
     * Create a new Customer.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($params)
    {
        return $this->client->post('customers.json', 'customer', [
            'customer' => $params,
        ]);
    }

    /**
     * Modify an existing Customer.
     *
     * @param string $id
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function update($id, $params)
    {
        return $this->client->put("customers/{$id}.json", 'customer', [
            'customer' => $params,
        ]);
    }

    /**
     * Create account activation URL.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     *
     * @return string
     */
    public function createAccountActivationUrl($id)
    {
        return $this->client->post("customers/{$id}/account_activation_url.json", 'account_activation_url');
    }

    /**
     * Send an invite.
     *
     * @param string $id
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function sendInvite($id, $params = [])
    {
        return $this->client->post("customers/{$id}/send_invite.json", 'customer_invite', $params);
    }

    /**
     * Remove a Customer from the database.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("customers/{$id}.json");
    }

    /**
     * Receive a count of all Customers.
     *
     * @throws ShopifyApiException
     *
     * @return int
     */
    public function count()
    {
        return $this->client->get('customers/count.json', 'count');
    }

    /**
     * Find orders belonging to this customer.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function orders($id)
    {
        return $this->client->get("customers/{$id}/orders.json", 'orders');
    }
}
