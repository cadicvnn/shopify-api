<?php

namespace Secomapp;


use Secomapp\Exceptions\ShopifyApiException;
use Secomapp\Contracts\ClientApiContract;
use Shopify\Api\Client;
use Shopify\HttpClient\CurlHttpClient;

class ClientApi implements ClientApiContract
{

    /**
     * @var Client
     */
    private $client;

    /**
     * ClientApi constructor.
     * @param string|bool $clientSecret
     * @param string|bool $shopName
     * @param string|bool $accessToken
     */
    function __construct($clientSecret = false, $shopName = false, $accessToken = false)
    {
        $httpClient = new CurlHttpClient();
        $httpClient->setVerifyPeer(false);

        $client = new Client ($httpClient);
        if ($clientSecret) {
            $client->setClientSecret($clientSecret);
        }
        if ($shopName) {
            $client->setShopName($shopName);
        }
        if ($accessToken) {
            $client->setAccessToken($accessToken);
        }

        $this->client = new Client ($httpClient);
    }

    public function setShopName($shopName)
    {
        $this->client->setShopName($shopName);
    }

    /**
     * returns true if the supplied request params are valid
     * @param array $params
     * @return boolean
     */
    public function isValidRequest($params)
    {
        return $this->client->isValidRequest($params);
    }

    public function isValidProxyRequest($param)
    {
        return $this->client->isValidProxyRequest($param);
    }

    function setAccessToken($accessToken)
    {
        $this->client->setAccessToken($accessToken);
    }

    function setClientSecret($secret)
    {
        $this->client->setClientSecret($secret);
    }

    public function get($url, $extract, $params = [])
    {
        $response = $this->client->get("/admin/$url", $params);
        if (isset ($response->errors)) {
            throw new ShopifyApiException(json_encode($response->errors));
        }

        return !is_null($response) && property_exists($response, $extract) ? $response->$extract : false;
    }

    public function post($url, $extract, $params = [])
    {
        $response = $this->client->post("/admin/$url", $params);
        if (isset ($response->errors)) {
            throw new ShopifyApiException(json_encode($response->errors));
        }

        return !is_null($response) && property_exists($response, $extract) ? $response->$extract : false;
    }

    public function put($url, $extract, $params = [])
    {
        $response = $this->client->put("/admin/$url", $params);
        if (isset ($response->errors)) {
            throw new ShopifyApiException(json_encode($response->errors));
        }

        return !is_null($response) && property_exists($response, $extract) ? $response->$extract : false;
    }

    public function delete($url, $params = [])
    {
        $response = $this->client->delete("/admin/$url", $params);
        if (isset ($response->errors)) {
            throw new ShopifyApiException(json_encode($response->errors));
        }
    }
}