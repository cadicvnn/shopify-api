<?php

namespace Secomapp\Resources;


use Secomapp\BaseResource;

class Theme extends BaseResource
{
    /**
     * @param string $fields comma-separated list of fields to include in the response
     * @return mixed
     */
    public function all($fields = null)
    {
        $params = $this->prepareFields($fields);
        return $this->client->get('themes.json', 'themes', $params);
    }

    public function get($id, $fields = null)
    {
        $params = $this->prepareFields($fields);
        return $this->client->get("themes/{$id}.json", 'theme', $params);
    }
}