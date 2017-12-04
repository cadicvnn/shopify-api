<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;

class Shop extends BaseResource
{
    /**
     * Receive a single Shop
     *
     * @param string $fields
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function get($fields = null)
    {
        return $this->client->get('shop.json', 'shop', $this->prepareParams($fields));
    }
}
