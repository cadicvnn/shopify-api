<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;

class Metafield extends BaseResource
{
    /**
     * @param string $resourceType The type of shopify resource to obtain metafields for. This could be variants, products, orders, customers, custom_collections.
     * @param string $resourceId   The Id of the resource the metafield will be associated with. This can be variants, products, orders, customers, custom_collections, etc.
     *
     * @return mixed
     */
    public function allForResource($resourceType, $resourceId)
    {
        return $this->client->get("{$resourceType}/{$resourceId}/metafields.json", 'metafields');
    }

    /**
     * @param array|bool $params
     *
     * @return mixed
     */
    public function all($params = false)
    {
        if ($params) {
            return $this->client->get('metafields.json', 'metafields', $params);
        } else {
            return $this->client->get('metafields.json', 'metafields');
        }
    }

    /**
     * Retrieves the resource metafield with the given id.
     *
     * @param string $resourceType The type of shopify resource to obtain metafields for. This could be variants, products, orders, customers, custom_collections.
     * @param string $resourceId   The Id of the resource the metafield will be associated with. This can be variants, products, orders, customers, custom_collections, etc.
     * @param string $metafieldId  The metafield id
     */
    public function getForResource($resourceType, $resourceId, $metafieldId)
    {
        return $this->client->get("{$resourceType}/{$resourceId}/metafields/{$metafieldId}.json", 'metafield');
    }

    /**
     * Retrieves the shop metafield with the given id.
     *
     * @param string $metafieldId The metafield id
     */
    public function get($metafieldId)
    {
        return $this->client->get("metafields/{$metafieldId}.json", 'metafield');
    }

    /**
     * @param string $resourceType The type of shopify resource to obtain metafields for. This could be variants, products, orders, customers, custom_collections.
     * @param string $resourceId   The Id of the resource the metafield will be associated with. This can be variants, products, orders, customers, custom_collections, etc.
     * @param array  $metafield
     */
    public function createForResource($resourceType, $resourceId, $metafield)
    {
        $params = ['metafield' => $metafield];

        return $this->client->post("{$resourceType}/{$resourceId}/metafields.json", 'metafield', $params);
    }

    /**
     * @param array $metafield
     */
    public function create($metafield)
    {
        $params = ['metafield' => $metafield];

        return $this->client->post('metafields.json', 'metafield', $params);
    }

    /**
     * @param string $resourceType The type of shopify resource to obtain metafields for. This could be variants, products, orders, customers, custom_collections.
     * @param string $resourceId   The Id of the resource the metafield will be associated with. This can be variants, products, orders, customers, custom_collections, etc.
     * @param string $metafieldId  The metafield id
     * @param array  $metafield
     */
    public function updateForResource($resourceType, $resourceId, $metafieldId, $metafield)
    {
        $params = ['metafield' => $metafield];

        return $this->client->put("{$resourceType}/{$resourceId}/metafields/{$metafieldId}.json", 'metafield', $params);
    }

    /**
     * @param string $metafieldId The metafield id
     * @param array  $metafield
     */
    public function update($metafieldId, $metafield)
    {
        $params = ['metafield' => $metafield];

        return $this->client->put("metafields/{$metafieldId}.json", 'metafield', $params);
    }

    /**
     * @param string        $resourceType The type of shopify resource to obtain metafields for. This could be variants, products, orders, customers, custom_collections.
     * @param string        $resourceId   The Id of the resource the metafield will be associated with. This can be variants, products, orders, customers, custom_collections, etc.
     * @param @param string $metafieldId  The metafield id
     */
    public function deleteForResource($resourceType, $resourceId, $metafieldId)
    {
        $this->client->delete("{$resourceType}/{$resourceId}/metafields/{$metafieldId}.json");
    }

    /**
     * @param @param string $metafieldId The metafield id
     */
    public function delete($metafieldId)
    {
        $this->client->delete("metafields/{$metafieldId}.json");
    }
}
