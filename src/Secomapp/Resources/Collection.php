<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class Collection extends BaseResource
{
    /**
     * Receive a list of all Collections.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($params = [])
    {
        return $this->client->get('collections.json', 'collections', $params);
    }

    /**
     * Receive a count of all Collections.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return int
     */
    public function count($params = [])
    {
        return $this->client->get('collections/count.json', 'count', $params);
    }

    /**
     * Receive a single Collection.
     *
     * @param string $id
     * @param string $fields comma-separated list of fields to include in the response
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function get($id, $fields = null)
    {
        return $this->client->get("collection/{$id}.json", 'collection', $this->prepareParams($fields));
    }

    /**
     * Remove a Collection from the database.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("collections/{$id}.json");
    }
}
