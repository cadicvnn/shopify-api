<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class Theme extends BaseResource
{
    /**
     * Receive a list of all Themes.
     *
     * @param string $fields comma-separated list of fields to include in the response
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($fields = null)
    {
        return $this->client->get('themes.json', 'themes', $this->prepareParams($fields));
    }

    /**
     * Receive a single Theme.
     *
     * @param string $id
     * @param string $fields
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function get($id, $fields = null)
    {
        return $this->client->get("themes/{$id}.json", 'theme', $this->prepareParams($fields));
    }

    /**
     * Create a new Theme.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($params)
    {
        return $this->client->post('themes.json', 'theme', [
            'theme' => $params,
        ]);
    }

    /**
     * Modify an existing Theme.
     *
     * @param string $id
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function update($id, $params)
    {
        return $this->client->put("themes/{$id}.json", 'theme', [
            'theme' => $params,
        ]);
    }

    /**
     * Remove a Theme from the database.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("themes/{$id}.json");
    }
}
