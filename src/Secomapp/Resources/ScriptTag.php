<?php

namespace Secomapp\Resources;

use stdClass;
use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;

class ScriptTag extends BaseResource
{
    /**
     * Receive a list of all ScriptTags
     *
     * @param array $params
     *
     * @return array
     * @throws ShopifyApiException
     */
    public function all($params = [])
    {
        return $this->client->get('script_tags.json', 'script_tags', $params);
    }

    /**
     * Receive a count of all ScriptTags
     *
     * @param array $params
     *
     * @return integer
     * @throws ShopifyApiException
     */
    public function count($params = [])
    {
        return $this->client->get('script_tags/count.json', 'count', $params);
    }

    /**
     * Receive a single ScriptTag
     *
     * @param string $id
     * @param string $fields
     *
     * @return stdClass
     * @throws ShopifyApiException
     */
    public function get($id, $fields = null)
    {
        return $this->client->get("script_tags/{$id}.json", 'script_tag', $this->prepareParams($fields));
    }

    /**
     * Create a new ScriptTag
     *
     * @param string $url
     *
     * @return stdClass
     * @throws ShopifyApiException
     */
    public function create($url)
    {
        return $this->client->post('script_tags.json', 'script_tag', ['script_tag' => [
            'event' => 'onload',
            'src'   => $url,
        ]]);
    }

    /**
     * Modify an existing ScriptTag
     *
     * @param string $id
     * @param string $url
     *
     * @return stdClass
     * @throws ShopifyApiException
     */
    public function update($id, $url)
    {
        return $this->client->put("script_tags/{$id}.json", 'script_tag', ['script_tag' => [
            'id'  => $id,
            'src' => $url,
        ]]);
    }

    /**
     * Remove a ScriptTag from the database
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("script_tags/{$id}.json");
    }
}
