<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;

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
        return $this->client->get('oauth/access_scopes.json', 'access_scopes');
    }
}
