<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;

/**
 * Class Discount is a class for manipulating Shopify discount code.
 *
 * @author baorv <roanvanbao@gmail.com>
 * @version 0.0.1
 */
class DiscountCode extends BaseResource
{

    /**
     * Create a discount code
     *
     * @param $priceRuleId
     * @param $discountCode
     * @return \stdClass
     */
    public function create($priceRuleId, $discountCode)
    {
        $params = [
            'discount_code' => $discountCode
        ];
        return $this->client->post("price_rules/{$priceRuleId}/discount_codes.json", 'discount_code', $params);
    }

    /**
     * Change DiscountCode attributes
     *
     * @param $priceRuleId
     * @param $discountCodeId
     * @param $discountCode
     * @return \stdClass
     */
    public function update($priceRuleId, $discountCodeId, $discountCode)
    {
        $params = [
            'discount_code' => $discountCode
        ];
        return $this->client->put("price_rules/{$priceRuleId}/discount_codes/{$discountCodeId}.json", 'discount_code', $params);
    }

    /**
     * Retrieve a list of discount codes
     * @param $priceRuleId
     * @return \stdClass
     */
    public function all($priceRuleId)
    {
        return $this->client->get("price_rules/{$priceRuleId}/discount_codes.json", 'discount_codes');
    }

    /**
     * Retrieve a single discount code
     * @param $priceRuleId
     * @param $discountCodeId
     * @return \stdClass
     */
    public function get($priceRuleId, $discountCodeId)
    {
        return $this->client->get("price_rules/{$priceRuleId}/discount_codes/{$discountCodeId}.json", 'discount_code');
    }

    /**
     * Permanently delete a discount code
     *
     * @param $priceRuleId
     * @param $discountCodeId
     */
    public function delete($priceRuleId, $discountCodeId)
    {
        $this->client->delete("price_rules/{$priceRuleId}/discount_codes/{$discountCodeId}.json");
    }
}