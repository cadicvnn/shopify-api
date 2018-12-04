<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class AccessScope extends BaseResource
{
    /**
     * Retrieves a list of access scopes associated to the access token.
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all()
    {
        return $this->client->get('access_scopes.json', 'access_scopes');
    }
}
