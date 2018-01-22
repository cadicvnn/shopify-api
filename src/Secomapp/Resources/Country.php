<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;

/**
 * Class Country works with country API in shopify
 *
 * @package Secomapp\Resources
 * @author baorv <roanvanbao@gmail.com>
 * @version 0.0.1
 */
class Country extends BaseResource
{

    /**
     * Get a list of all countries
     *
     * @param array $params
     * @return array
     * @throws ShopifyApiException
     */
    public function all($params = [])
    {
        return $this->client->get('countries.json', 'countries', $params);
    }

    /**
     * Get a count of all countries
     *
     * @return int
     * @throws ShopifyApiException
     */
    public function count()
    {
        return $this->client->get('countries/count.json', 'count');
    }

    /**
     * Show country information
     *
     * @param int $id
     * @param null $fields
     * @return array
     * @throws ShopifyApiException
     */
    public function get($id, $fields = null)
    {
        return $this->client->get("countries/{$id}.json", 'country', $this->prepareParams($fields));
    }

    /**
     * Create new country with given information
     *
     * @param array $params
     * @return array
     * @throws ShopifyApiException
     */
    public function create($params)
    {
        return $this->client->post('countries.json', 'country', [
            'country' => $params
        ]);
    }

    /**
     * Update a country with new information
     *
     * @param int $id
     * @param array $params
     * @return array
     * @throws ShopifyApiException
     */
    public function update($id, $params)
    {
        return $this->client->put("countries/{$id}.json", 'country', [
            'country' => $params
        ]);
    }

    /**
     * Delete a country from shopify
     *
     * @param int $id
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("/admin/countries/{$id}.json");
    }
}