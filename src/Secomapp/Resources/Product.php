<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;

class Product extends BaseResource
{
    public function all($params = [])
    {
        return $this->client->get('products.json', 'products', $params);
    }

    public function update($id, $product)
    {
        $params = ['product' => $product];

        return $this->client->put("products/{$id}.json", 'product', $params);
    }

    public function delete($id)
    {
        return $this->client->delete("products/{$id}.json");
    }
}
