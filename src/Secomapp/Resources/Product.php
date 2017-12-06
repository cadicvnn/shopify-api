<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class Product extends BaseResource
{
    /**
     * Receive a list of all Products.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($params = [])
    {
        return $this->client->get('products.json', 'products', $params);
    }

    /**
     * Receive a count of all Products.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return int
     */
    public function count($params = [])
    {
        return $this->client->get('products/count.json', 'count', $params);
    }

    /**
     * Receive a single Product.
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
        return $this->client->get("products/{$id}.json", 'product', $this->prepareParams($fields));
    }

    /**
     * Create a new Product.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($params)
    {
        return $this->client->post('products.json', 'product', [
            'product' => $params,
        ]);
    }

    /**
     * Modify an existing Product.
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
        return $this->client->put("products/{$id}.json", 'product', [
            'product' => $params,
        ]);
    }

    /**
     * Remove a Product from the database.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("products/{$id}.json");
    }
}
