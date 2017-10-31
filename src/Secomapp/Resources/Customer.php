<?php

namespace Secomapp\Resources;


use Secomapp\BaseResource;

class Customer extends BaseResource
{
    public function count()
    {
        return $this->client->get('customers/count.json', 'count');
    }

    public function all($params)
    {
        return $this->client->get('customers.json', 'customers', $params);
    }

    public function get($id, $fields = null)
    {
        $params = $this->prepareFields($fields);
        return $this->client->get("customers/{$id}.json", 'customer', $params);
    }

    public function update($id, $customer)
    {
        $params = [
            'customer' => $customer
        ];
        return $this->client->put("customers/{$id}.json", 'customer', $params);
    }
}