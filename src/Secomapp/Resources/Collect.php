<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;

class Collect extends BaseResource
{
    public function all($params = [])
    {
        return $this->client->get('collects.json', 'collects', $params);
    }

    public function get($customCollectionId, $params, $fields = null)
    {
        $params = $this->prepareFields($fields);
        
        return $this->client->get("collects.json?{$customCollectionId}", 'collects', $params);
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