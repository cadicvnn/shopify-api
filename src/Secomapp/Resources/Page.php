<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class Page extends BaseResource
{
    /**
     * Receive a list of all pages.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($params = [])
    {
        return $this->client->get('pages.json', 'pages', $params);
    }

    /**
     * Receive a count of all pages.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return int
     */
    public function count($params = [])
    {
        return $this->client->get('pages/count.json', 'count', $params);
    }

    /**
     * Receive a single page by its ID.
     *
     * @param string $pageId
     * @param string $fields
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function get($pageId, $fields = null)
    {
        return $this->client->get("pages/{$pageId}.json", 'page', $this->prepareParams($fields));
    }

    /**
     * Create a new page.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($params)
    {
        return $this->client->post("pages.json", 'page', [
            'page' => $params,
        ]);
    }

    /**
     * Update a page.
     *
     * @param $pageId
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function update($pageId, $params)
    {
        return $this->client->put("pages/{$pageId}.json", 'page', [
            'page' => $params,
        ]);
    }

    /**
     * Delete a page.
     *
     * @param string $pageId
     *
     * @throws ShopifyApiException
     */
    public function delete($pageId)
    {
        $this->client->delete("pages/{$pageId}.json");
    }
}
