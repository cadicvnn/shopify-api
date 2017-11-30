<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;

class ScriptTag extends BaseResource
{
    public function count($params = [])
    {
        return $this->client->get('script_tags/count.json', 'count', $params);
    }

    public function all($params = [])
    {
        return $this->client->get('script_tags.json', 'script_tags', $params);
    }

    public function get($id, $fields = null)
    {
        $params = $this->prepareFields($fields);

        return $this->client->get("script_tags/{$id}.json", 'script_tag', $params);
    }

    public function create($url)
    {
        $params = ['script_tag' => [
            'event' => 'onload',
            'src'   => $url,
        ]];

        return $this->client->post('script_tags.json', 'script_tag', $params);
    }

    public function update($id, $url)
    {
        $params = ['script_tag' => [
            'id'  => $id,
            'src' => $url,
        ]];

        return $this->client->put("script_tags/{$id}.json", 'script_tag', $params);
    }

    public function delete($id)
    {
        $this->client->delete("script_tags/{$id}.json");
    }
}
