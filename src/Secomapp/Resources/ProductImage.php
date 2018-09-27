<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class ProductImage extends BaseResource
{
    /**
     * Receive a list of all Product Images.
     *
     * @param string $productId
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($productId, $params = [])
    {
        return $this->client->get("products/{$productId}/images.json", 'images', $params);
    }

    /**
     * Receive a count of all Product Images.
     *
     * @param string $productId
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return int
     */
    public function count($productId, $params = [])
    {
        return $this->client->get("products/{$productId}/images/count.json", 'count', $params);
    }

    /**
     * Receive a single Product Image.
     *
     * @param string $productId
     * @param string $id
     * @param string $fields
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function get($productId, $id, $fields = null)
    {
        return $this->client->get("products/{$productId}/images/{$id}.json", 'image', $this->prepareParams($fields));
    }

    /**
     * Create a new Product Image.
     *
     * @param string $productId
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($productId, $params)
    {
        return $this->client->post("products/{$productId}/images.json", 'image', [
            'image' => $params,
        ]);
    }

    /**
     * Modify an existing Product Image.
     *
     * @param string $productId
     * @param string $id
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function update($productId, $id, $params)
    {
        return $this->client->put("products/{$productId}/images/{$id}.json", 'image', [
            'image' => $params,
        ]);
    }

    /**
     * Remove a Product Image from the database.
     *
     * @param string $productId
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function delete($productId, $id)
    {
        $this->client->delete("products/{$productId}/images/{$id}.json");
    }
}
