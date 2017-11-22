<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;

class Collect extends BaseResource
{
    public function all($params = [])
    {
        return $this->client->get('collects.json', 'collects', $params);
    }

    public function get($customCollectionId, $productId, $params, $fields = null)
    {
        $params = array_merge($params, $this->prepareFields($fields));

        $url = 'collects.json';
        if ($customCollectionId) {
            $url = "{$url}?collection_id={$customCollectionId}";
        }
        if ($productId) {
            $url = $url.($customCollectionId ? '&' : '?')."product_id={$productId}";
        }

        return $this->client->get($url, 'collects', $params);
    }

    public function create($params)
    {
        $params = ['collect' => $params];

        return $this->client->post('collects.json', 'collect', $params);
    }

    public function delete($id)
    {
        return $this->client->delete("collects/{$id}.json");
    }
}
