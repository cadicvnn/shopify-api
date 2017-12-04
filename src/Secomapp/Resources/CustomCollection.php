<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;

class CustomCollection extends BaseResource
{
    /**
     * Receive a list of all CustomCollections
     *
     * @param array $params
     *
     * @return array
     * @throws ShopifyApiException
     */
    public function all($params = [])
    {
        return $this->client->get('custom_collections.json', 'custom_collections', $params);
    }

    /**
     * Receive a count of all CustomCollections
     *
     * @param array $params
     *
     * @return integer
     * @throws ShopifyApiException
     */
    public function count($params = [])
    {
        return $this->client->get('custom_collections/count.json', 'count', $params);
    }

    /**
     * Receive a single CustomCollection
     *
     * @param string $id The id of the custom collection to retrieve.
     * @param string $fields comma-separated list of fields to include in the response
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function get($id, $fields = null)
    {
        return $this->client->get("custom_collections/{$id}.json", 'custom_collection', $this->prepareParams($fields));
    }

    /**
     * Create a new CustomCollection
     *
     * @param array $params
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function create($params)
    {
        return $this->client->post('custom_collections.json', 'custom_collection', [
            'custom_collection' => $params
        ]);
    }

    /**
     * Modify an existing CustomCollection
     *
     * @param string $id
     * @param array $params
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function createOrUpdate($id, $params)
    {
        return $this->client->put("custom_collections/{$id}.json", 'custom_collection', [
            'custom_collection' => $params
        ]);
    }

    /**
     * Remove a CustomCollection from the database
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("custom_collections/{$id}.json");
    }
}
