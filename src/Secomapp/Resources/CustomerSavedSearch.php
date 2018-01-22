<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;

/**
 * Class CustomerSavedSearch works with Customer saved search API in shopify
 *
 * @package Secomapp\Resources
 * @author baorv <roanvanbao@gmail.com>
 * @version 0.0.1
 */
class CustomerSavedSearch extends BaseResource
{

    /**
     * Get a count of all customer saved searches
     *
     * @param array $params
     * @return array
     * @throws \Secomapp\Exceptions\ShopifyApiException
     */
    public function count($params = [])
    {
        return $this->client->get('customer_saved_searches/count.json', 'count', $params);
    }

    /**
     * Get a list of all customer saved searches
     *
     * @param array $params
     * @return array
     * @throws \Secomapp\Exceptions\ShopifyApiException
     */
    public function all($params = [])
    {
        return $this->client->get('customer_saved_searches.json', 'customer_saved_searches', $params);
    }

    /**
     * Get a single customer saved search
     *
     * @param int $id
     * @param null|string $fields
     * @return array
     * @throws \Secomapp\Exceptions\ShopifyApiException
     */
    public function get($id, $fields = null)
    {
        return $this->client->get("customer_saved_searches/{$id}.json", 'customer_saved_search', $this->prepareParams($fields));
    }
}
