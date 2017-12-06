<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class Webhook extends BaseResource
{
    /**
     * Receive a list of all Webhooks.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($params = [])
    {
        return $this->client->get('webhooks.json', 'webhooks', $params);
    }

    /**
     * Receive a count of all Webhooks.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return int
     */
    public function count($params = [])
    {
        return $this->client->get('webhooks/count.json', 'count', $params);
    }

    /**
     * Receive a single Webhook.
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
        return $this->client->get("webhooks/{$id}.json", 'webhook', $this->prepareParams($fields));
    }

    /**
     * Create a new Webhook.
     *
     * @param string $topic
     * @param string $url
     * @param string $format
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($topic, $url, $format = 'json')
    {
        return $this->client->post('webhooks.json', 'webhook', [
            'webhook' => [
                'topic'   => $topic,
                'address' => $url,
                'format'  => $format,
            ],
        ]);
    }

    /**
     * Modify an existing Webhook.
     *
     * @param string $id
     * @param string $url
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function update($id, $url)
    {
        return $this->client->put("webhooks/{$id}.json", 'webhook', ['webhook' => [
            'id'      => $id,
            'address' => $url,
        ]]);
    }

    /**
     * Remove a Webhook from the database.
     *
     * @param string $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("webhooks/{$id}.json");
    }
}
