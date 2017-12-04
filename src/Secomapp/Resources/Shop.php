<?php

namespace Secomapp\Resources;

use stdClass;
use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;

class Shop extends BaseResource
{
    /**
     * Receive a single Shop
     *
     * @param string $fields
     *
     * @return stdClass
     * @throws ShopifyApiException
     */
    public function get($fields = null)
    {
        return $this->client->get('shop.json', 'shop', $this->prepareParams($fields));
    }
}
