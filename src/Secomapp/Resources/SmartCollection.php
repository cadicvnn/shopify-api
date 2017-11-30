<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;

class SmartCollection extends BaseResource
{
    public function count($params = [])
    {
        return $this->client->get('smart_collections/count.json', 'count', $params);
    }

    /**
     * Retrieves a list of all objects.
     * Listing theme assets only returns metadata about each asset
     * you need to request assets individually in order to get their contents.
     *
     * @param array $params
     *
     * @return mixed
     */
    public function all($params = [])
    {
        return $this->client->get('smart_collections.json', 'smart_collections', $params);
    }

    /**
     * Retrieves the Custom Collection with the given id.
     *
     * @param string      $smartCollectionId The id of the smart collection to retrieve.
     * @param string|null $fields            A comma-separated list of fields to return.
     */
    public function get($smartCollectionId, $fields = null)
    {
        $params = $this->prepareFields($fields);

        return $this->client->get("smart_collections/{$smartCollectionId}.json", 'smart_collection', $params);
    }

    /**
     * Creates a new Custom Collection
     * column - tag, title, type, vendor, variant_price, variant_compare_at_price, variant_weight, variant_inventory, variant_title
     * relation - equals, greater_than, less_than, starts_with, ends_with, contains
     * condition - any string.
     *
     * @param array $params
     */
    public function create($params)
    {
        $params = ['smart_collection' => $params];

        return $this->client->post('smart_collections.json', 'smart_collection', $params);
    }

    public function delete($id)
    {
        $this->client->delete("smart_collections/{$id}.json");
    }
}
