<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;

class GraphQL extends BaseResource
{
    /**
     * Call a GraphQL query.
     *
     * @param string $query
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return mixed
     */
    public function graph($query, $params = [])
    {
        // Build the request
        $request = ['query' => $query];
        if (count($params) > 0) {
            $request['variables'] = $params;
        }

        return $this->client->post('graphql.json', null, $request);
    }
}
