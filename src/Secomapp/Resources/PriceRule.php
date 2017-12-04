<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;

/**
 * Class PriceRule handles all requests for price rules in shopify API
 *
 * @package Secomapp\Resources
 * @author baorv <roanvanbao@gmail.com>
 * @version 0.0.1
 */
class PriceRule extends BaseResource
{

    /**
     * Gets a list of up to 250 of the shop's price rules.
     */
    public function all() {
        return $this->client->get('price_rules.json', 'price_rules');
    }

    /**
     * Retrieves the object with the given id.
     * @param $id
     * @param null $fields
     * @return \stdClass
     */
    public function get($id, $fields = null) {
        $params = $this->prepareFields($fields);
        return $this->client->get("price_rules/{$id}.json", 'price_rule', $params);
    }

    /**
     * Creates a new price rule.
     *
     * @param $rule
     * @return \stdClass
     */
    public function create($rule) {
        $params = [
            'price_rule' => $rule
        ];
        return $this->client->post('price_rules.json', 'price_rule', $params);
    }

    /**
     * Updates the given object.
     *
     * @param $id
     * @param $rule
     * @return \stdClass
     */
    public function update($id, $rule) {
        $params = [
            'price_rule' => $rule
        ];
        return $this->client->put("price_rules/{$id}.json", 'price_rule', $params);
    }

    /**
     * Deletes the object with the given Id.
     *
     * @param $id
     */
    public function delete($id) {
        $this->client->delete("price_rules/{$id}.json");
    }
}