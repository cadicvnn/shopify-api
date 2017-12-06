<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class Shop extends BaseResource
{
    /**
     * Receive a single Shop.
     *
     * @param string $fields
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function get($fields = null)
    {
        return $this->client->get('shop.json', 'shop', $this->prepareParams($fields));
    }
}
