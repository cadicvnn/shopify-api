<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class Order extends BaseResource
{
    /**
     * Retrieve a list of Orders (OPEN Orders by default, use status=any for ALL orders).
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($params = [])
    {
        return $this->client->get('orders.json', 'orders', $params);
    }

    /**
     * Receive a single Order.
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
        return $this->client->get("orders/{$id}.json", 'order', $this->prepareParams($fields));
    }

    /**
     * Receive a count of all Orders.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return int
     */
    public function count($params = [])
    {
        return $this->client->get('orders/count.json', 'count', $params);
    }

    /**
     * Close an Order.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function close($id)
    {
        $this->client->post("orders/{$id}/close.json");
    }

    /**
     * Open an Order.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function open($id)
    {
        $this->client->post("orders/{$id}/open.json");
    }

    /**
     * Cancel an Order.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function cancel($id)
    {
        $this->client->post("orders/{$id}/cancel.json");
    }

    /**
     * Create a new Order.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($params)
    {
        return $this->client->post('orders.json', 'order', [
            'order' => $params,
        ]);
    }

    /**
     * Modify an existing Order.
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
        return $this->client->put("orders/{$id}.json", 'order', [
            'order' => $params,
        ]);
    }

    /**
     * Remove a Order from the database.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("orders/{$id}.json");
    }
}
