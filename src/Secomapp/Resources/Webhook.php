<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;

class Webhook extends BaseResource
{
    /**
     * Receive a list of all Webhooks
     *
     * @param array $params
     *
     * @return array
     * @throws ShopifyApiException
     */
    public function all($params = [])
    {
        return $this->client->get('webhooks.json', 'webhooks', $params);
    }

    /**
     * Receive a count of all Webhooks
     *
     * @param array $params
     *
     * @return integer
     * @throws ShopifyApiException
     */
    public function count($params = [])
    {
        return $this->client->get('webhooks/count.json', 'count', $params);
    }

    /**
     * Receive a single Webhook
     *
     * @param string $id
     * @param string $fields
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function get($id, $fields = null)
    {
        return $this->client->get("webhooks/{$id}.json", 'webhook', $this->prepareParams($fields));
    }

    /**
     * Create a new Webhook
     *
     * @param string $topic
     * @param string $url
     * @param string $format
     *
     * @return object
     * @throws ShopifyApiException
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
     * Modify an existing Webhook
     *
     * @param string $id
     * @param string $url
     *
     * @return object
     * @throws ShopifyApiException
     */
    public function update($id, $url)
    {
        return $this->client->put("webhooks/{$id}.json", 'webhook', ['webhook' => [
            'id'      => $id,
            'address' => $url,
        ]]);
    }

    /**
     * Remove a Webhook from the database
     *
     * @param $id
     *
     * @throws ShopifyApiException
     */
    public function delete($id)
    {
        $this->client->delete("webhooks/{$id}.json");
    }
}
