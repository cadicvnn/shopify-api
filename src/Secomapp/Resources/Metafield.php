<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class Metafield extends BaseResource
{
    /**
     * Get metafields that belong to a store.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($params = [])
    {
        return $this->client->get('metafields.json', 'metafields', $params);
    }

    /**
     * Get metafields that belong to a resource.
     *
     * @param string $resource   The type of shopify resource to obtain metafields for. This could be variants, products, orders, customers, custom_collections.
     * @param string $resourceId The Id of the resource the metafield will be associated with.
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function allForResource($resource, $resourceId)
    {
        return $this->client->get("{$resource}/{$resourceId}/metafields.json", 'metafields');
    }

    /**
     * Get a count of metafields that belong to a store.
     *
     * @throws ShopifyApiException
     *
     * @return int
     */
    public function count()
    {
        return $this->client->get('metafields/count.json', 'count');
    }

    /**
     * Get a count of metafields that belong to a resource.
     *
     * @param string $resource   The type of shopify resource to obtain metafields for. This could be variants, products, orders, customers, custom_collections.
     * @param string $resourceId The Id of the resource the metafield will be associated with.
     *
     * @throws ShopifyApiException
     *
     * @return int
     */
    public function countForResource($resource, $resourceId)
    {
        return $this->client->get("{$resource}/{$resourceId}/metafields/count.json", 'count');
    }

    /**
     * Get a single store metafield by its ID.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function get($id)
    {
        return $this->client->get("metafields/{$id}.json", 'metafield');
    }

    /**
     * Get a single resource metafield by its ID.
     *
     * @param string $resource   The type of shopify resource to obtain metafields for. This could be variants, products, orders, customers, custom_collections.
     * @param string $resourceId The Id of the resource the metafield will be associated with.
     * @param string $id
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function getForResource($resource, $resourceId, $id)
    {
        return $this->client->get("{$resource}/{$resourceId}/metafields/{$id}.json", 'metafield');
    }

    /**
     * Create a new metafield for a store.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($params)
    {
        return $this->client->post('metafields.json', 'metafield', [
            'metafield' => $params,
        ]);
    }

    /**
     * Create a new metafield for a resource.
     *
     * @param string $resource   The type of shopify resource to obtain metafields for. This could be variants, products, orders, customers, custom_collections.
     * @param string $resourceId The Id of the resource the metafield will be associated with.
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function createForResource($resource, $resourceId, $params)
    {
        return $this->client->post("{$resource}/{$resourceId}/metafields.json", 'metafield', [
            'metafield' => $params,
        ]);
    }

    /**
     * Update a store metafield.
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
        return $this->client->put("metafields/{$id}.json", 'metafield', [
            'metafield' => $params,
        ]);
    }

    /**
     * Update a resource metafield.
     *
     * @param string $resource   The type of shopify resource to obtain metafields for. This could be variants, products, orders, customers, custom_collections.
     * @param string $resourceId The Id of the resource the metafield will be associated with.
     * @param string $id
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function updateForResource($resource, $resourceId, $id, $params)
    {
        return $this->client->put("{$resource}/{$resourceId}/metafields/{$id}.json", 'metafield', [
            'metafield' => $params,
        ]);
    }

    /**
     * Delete a store metafield.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("metafields/{$id}.json");
    }

    /**
     * Delete a resource metafield.
     *
     * @param string $resource   The type of shopify resource to obtain metafields for. This could be variants, products, orders, customers, custom_collections.
     * @param string $resourceId The Id of the resource the metafield will be associated with.
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function deleteForResource($resource, $resourceId, $id)
    {
        $this->client->delete("{$resource}/{$resourceId}/metafields/{$id}.json");
    }
}
