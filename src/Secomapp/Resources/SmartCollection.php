<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;

class SmartCollection extends BaseResource
{
    /**
     * Receive a list of all SmartCollections
     *
     * @param array $params
     *
     * @return array
     * @throws ShopifyApiException
     */
    public function all($params = [])
    {
        return $this->client->get('smart_collections.json', 'smart_collections', $params);
    }

    /**
     * Receive a count of all SmartCollections
     *
     * @param array $params
     *
     * @return integer
     * @throws ShopifyApiException
     */
    public function count($params = [])
    {
        return $this->client->get('smart_collections/count.json', 'count', $params);
    }

    /**
     * Receive a single SmartCollection
     *
     * @param string $id
     * @param string $fields comma-separated list of fields to include in the response
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function get($id, $fields = null)
    {
        return $this->client->get("smart_collections/{$id}.json", 'smart_collection', $this->prepareParams($fields));
    }

    /**
     * Create a new SmartCollection
     *
     * @param array $params
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function create($params)
    {
        return $this->client->post('smart_collections.json', 'smart_collection', [
            'smart_collection' => $params
        ]);
    }

    /**
     * Modify an existing SmartCollection
     *
     * @param string $id
     * @param array $params
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function update($id, $params)
    {
        return $this->client->put("smart_collections/{$id}.json", 'smart_collection', [
            'smart_collection' => $params
        ]);
    }

    /**
     * Set the ordering type of products in a smart collection
     *
     * @param string $id
     * @param string $sortOrder The type of sorting to apply. Valid values are listed in the Properties section above.
     *
     * @throws ShopifyApiException
     */
    public function updateSortOrder($id, $sortOrder)
    {
        $this->client->put("smart_collections/{$id}.json?sort_order={$sortOrder}", 'smart_collection');
    }

    /**
     * Set the manual order of products in a smart collection
     *
     * @param string $id
     * @param array $products Array of product ids in the order you want them arranged. (Applies only when sort_order is set to "manual")
     *
     * @throws ShopifyApiException
     */
    public function updateProductsOrder($id, $products)
    {
        $queryString = '';
        foreach ($products as $product) {
            $queryString = $queryString ? "{$queryString}&products[]={$product}" : "products[]={$product}";
        }
        $this->client->put("smart_collections/{$id}.json?{$queryString}", 'smart_collection');
    }

    /**
     * Remove a SmartCollection from the database
     *
     * @param $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("smart_collections/{$id}.json");
    }
}
