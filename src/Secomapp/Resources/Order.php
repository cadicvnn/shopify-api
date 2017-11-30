<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;

class Order extends BaseResource
{
    public function count($params = [])
    {
        return $this->client->get('orders/count.json', 'count', $params);
    }

    public function all($params = [])
    {
        return $this->client->get('orders.json', 'orders', $params);
    }

    public function get($id, $fields = null)
    {
        $params = $this->prepareFields($fields);

        return $this->client->get("orders/{$id}.json", 'order', $params);
    }
}
