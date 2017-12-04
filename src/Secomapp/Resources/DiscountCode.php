<?php

namespace Secomapp\Resources;

use stdClass;
use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;

/**
 * Class Discount is a class for manipulating Shopify discount code.
 *
 * @author baorv <roanvanbao@gmail.com>
 * @version 0.0.1
 */
class DiscountCode extends BaseResource
{

    /**
     * Create a new DiscountCode
     *
     * @param string $priceRuleId
     * @param string $discountCode
     *
     * @return stdClass
     * @throws ShopifyApiException
     */
    public function create($priceRuleId, $discountCode)
    {
        return $this->client->post("price_rules/{$priceRuleId}/discount_codes.json", 'discount_code', [
            'code' => $discountCode
        ]);
    }

    /**
     * Modify an existing DiscountCode
     *
     * @param string $priceRuleId
     * @param string $discountCodeId
     * @param string $discountCode
     *
     * @return stdClass
     * @throws ShopifyApiException
     */
    public function update($priceRuleId, $discountCodeId, $discountCode)
    {
        return $this->client->put("price_rules/{$priceRuleId}/discount_codes/{$discountCodeId}.json", 'discount_code', [
            'discount_code' => $discountCode
        ]);
    }

    /**
     * Receive a single DiscountCode
     *
     * @param string $priceRuleId
     * @param string $discountCodeId
     *
     * @return stdClass
     * @throws ShopifyApiException
     */
    public function get($priceRuleId, $discountCodeId)
    {
        return $this->client->get("price_rules/{$priceRuleId}/discount_codes/{$discountCodeId}.json", 'discount_code');
    }

    /**
     * Retrieve a list of discount codes
     *
     * @param string $priceRuleId
     *
     * @return stdClass
     * @throws ShopifyApiException
     */
    public function all($priceRuleId)
    {
        return $this->client->get("price_rules/{$priceRuleId}/discount_codes.json", 'discount_codes');
    }

    /**
     * Remove a DiscountCode from the database
     *
     * @param string $priceRuleId
     * @param string $discountCodeId
     *
     * @throws ShopifyApiException
     */
    public function delete($priceRuleId, $discountCodeId)
    {
        $this->client->delete("price_rules/{$priceRuleId}/discount_codes/{$discountCodeId}.json");
    }
}