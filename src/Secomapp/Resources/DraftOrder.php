<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class DraftOrder extends BaseResource
{
    /**
     * Retrieve a list of draft order.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($params = [])
    {
        return $this->client->get('draft_orders.json', 'draft_orders', $params);
    }

    /**
     * Receive a single draft order.
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
        return $this->client->get("draft_orders/{$id}.json", 'draft_order', $this->prepareParams($fields));
    }

    /**
     * Create a new draft order.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($params)
    {
        return $this->client->post('draft_orders.json', 'draft_order', [
            'draft_order' => $params,
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
        return $this->client->put("draft_orders/{$id}.json", 'draft_order', [
            'draft_order' => $params,
        ]);
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
        return $this->client->get('draft_orders/count.json', 'count', $params);
    }

    /**
     * Send invoice for the draft order.
     *
     * @param string $id
     * @param array  $params
     *
     * @throws ShopifyApiException
     */
    public function send_invoice($id, $params)
    {
        $this->client->put("draft_orders/{$id}/send_invoice.json", 'draft_order_invoice', [
            'draft_order_invoice' => $params,
        ]);
    }

    /**
     * Remove an Order from the database.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("draft_orders/{$id}.json");
    }

    /**
     * Complete a draft order.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function complete($id)
    {
        $this->client->put("draft_orders/{$id}/complete.json", 'draft_order');
    }
}
