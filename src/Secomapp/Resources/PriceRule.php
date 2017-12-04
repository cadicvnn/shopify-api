<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

/**
 * Class PriceRule handles all requests for price rules in shopify API.
 *
 * @author baorv <roanvanbao@gmail.com>
 *
 * @version 0.0.1
 */
class PriceRule extends BaseResource
{
    /**
     * Create a new PriceRule.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($params)
    {
        return $this->client->post('price_rules.json', 'price_rule', [
            'price_rule' => $params,
        ]);
    }

    /**
     * Modify an existing PriceRule.
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
        return $this->client->put("price_rules/{$id}.json", 'price_rule', [
            'price_rule' => $params,
        ]);
    }

    /**
     * Retrieve a list of price rules.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($params = [])
    {
        return $this->client->get('price_rules.json', 'price_rules', $params);
    }

    /**
     * Receive a single PriceRule.
     *
     * @param string $id
     * @param string $fields
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function get($id, $fields = null)
    {
        return $this->client->get("price_rules/{$id}.json", 'price_rule', $this->prepareParams($fields));
    }

    /**
     * Remove a PriceRule from the database.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("price_rules/{$id}.json");
    }
}
