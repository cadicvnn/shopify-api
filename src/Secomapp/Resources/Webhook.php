<?php

namespace Secomapp\Resources;


use Secomapp\BaseResource;

class Webhook extends BaseResource
{
    public function create($topic, $url)
    {
        return $this->client->post('webhooks.json', 'webhook', [
            'webhook' => [
                'topic' => $topic,
                'address' => $url,
                'format' => 'json'
            ]
        ]);
    }

    public function update($id, $url)
    {
        $params = ['webhook' => [
            'id' => $id,
            'address' => $url
        ]];
        return $this->client->put("webhooks/{$id}.json", 'webhook', $params);
    }

    /**
     * Gets a list of up to 250 of the shop's webhooks.
     *
     * @param string $address An optional filter for the address property. When used, the method will only return webhooks with the given address.
     * @param string $topic An optional filter for the topic property. When used, the method will only return webhooks with the given topic. A full list of topics can be found at https://help.shopify.com/api/reference/webhook.
     * @return array a list of webhooks
     */
    public function all($address = null, $topic = null)
    {
        $params = [];
        if ($address) {
            $params['address'] = $address;
        }
        if ($topic) {
            $params['topic'] = $topic;
        }

        return $this->client->get('webhooks.json', 'webhooks', $params);
    }
}