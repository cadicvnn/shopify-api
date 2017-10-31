<?php

namespace Secomapp\Resources;


use Secomapp\BaseResource;

class CustomCollection extends BaseResource
{
    /**
     * Retrieves a list of all objects.
     * Listing theme assets only returns metadata about each asset
     * you need to request assets individually in order to get their contents.
     *
     * @param array $params
     * @return mixed
     */
    public function all($params = null)
    {
        return $this->client->get("custom_collections.json", 'custom_collections', $params);
    }

    /**
     * Retrieves the Custom Collection with the given id.
     *
     * @param string $customCollectionId The id of the custom collection to retrieve.
     * @param string|null $fields A comma-separated list of fields to return.
     */
    public function get($customCollectionId, $fields = null)
    {
        $params = $this->prepareFields($fields);
        return $this->client->get("custom_collections/{$customCollectionId}.json", 'custom_collection', $params);
    }

    /**
     * Creates a new Custom Collection
     *
     * @param array $params
     */
    public function create($params)
    {
        $params = ['custom_collection' => $params];
        return $this->client->post("custom_collections.json", 'custom_collection', $params);
    }
}