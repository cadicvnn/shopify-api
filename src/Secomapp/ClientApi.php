<?php

namespace Secomapp;

use Secomapp\Contracts\ClientApiContract;
use Secomapp\Exceptions\ShopifyApiException;
use Shopify\Api\Client;
use Shopify\HttpClient\CurlHttpClient;

class ClientApi implements ClientApiContract
{
    /**
     * @var Client
     */
    private $client;

    /** @var ApiVersion */
    private $apiVersion;

    /**
     * ClientApi constructor.
     *
     * @param string|bool $clientSecret
     * @param string|bool $apiVersion
     * @param string|bool $shopName
     * @param string|bool $accessToken
     */
    public function __construct($clientSecret = false, $apiVersion = false, $shopName = false, $accessToken = false)
    {
        $httpClient = new CurlHttpClient();
        $httpClient->setVerifyPeer(false);

        $client = new Client($httpClient);
        if ($clientSecret) {
            $client->setClientSecret($clientSecret);
        }
        if ($shopName) {
            $client->setShopName($shopName);
        }
        if ($accessToken) {
            $client->setAccessToken($accessToken);
        }

        $this->client = $client;
        $this->apiVersion = ApiVersions::getInstance()->findVersion($apiVersion);
    }

    public function setShopName($shopName)
    {
        $this->client->setShopName($shopName);
    }

    /**
     * returns true if the supplied request params are valid.
     *
     * @param array $params
     *
     * @return bool
     */
    public function isValidRequest($params)
    {
        return $this->client->isValidRequest($params);
    }

    public function isValidProxyRequest($param)
    {
        return $this->client->isValidProxyRequest($param);
    }

    public function setAccessToken($accessToken)
    {
        $this->client->setAccessToken($accessToken);
    }

    public function setClientSecret($secret)
    {
        $this->client->setClientSecret($secret);
    }

    /**
     * @param string      $url
     * @param string|null $extract pass null to return full response
     * @param array       $params
     * @param array       $options
     *
     * @throws ShopifyApiException
     *
     * @return bool|object
     */
    public function get($url, $extract = null, $params = [], $options = [])
    {
        $response = $this->client->get($this->getApiUrl($url), $params, $options);

        if ($extract) {
            if (isset($response->errors)) {
                throw new ShopifyApiException(json_encode($response->errors));
            }

            return  !is_null($response) && property_exists($response, $extract) ? $response->$extract : false;
        } else {
            return $response;
        }
    }

    /**
     * @param string      $url
     * @param string|null $extract pass null to return full response
     * @param array       $params
     *
     * @throws ShopifyApiException
     *
     * @return bool|object
     */
    public function post($url, $extract = null, $params = [])
    {
        $response = $this->client->post($this->getApiUrl($url), $params);
        if (isset($response->errors)) {
            throw new ShopifyApiException(json_encode($response->errors));
        }

        if ($extract) {
            return  !is_null($response) && property_exists($response, $extract) ? $response->$extract : false;
        } else {
            return $response;
        }
    }

    /**
     * @param string      $url
     * @param string|null $extract pass null to return full response
     * @param array       $params
     *
     * @throws ShopifyApiException
     *
     * @return bool|object
     */
    public function put($url, $extract = null, $params = [])
    {
        $response = $this->client->put($this->getApiUrl($url), $params);
        if (isset($response->errors)) {
            throw new ShopifyApiException(json_encode($response->errors));
        }

        if ($extract) {
            return  !is_null($response) && property_exists($response, $extract) ? $response->$extract : false;
        } else {
            return $response;
        }
    }

    /**
     * @param string $url
     * @param array  $params
     *
     * @throws ShopifyApiException
     */
    public function delete($url, $params = [])
    {
        $response = $this->client->delete($this->getApiUrl($url), $params);
        if (isset($response->errors)) {
            throw new ShopifyApiException(json_encode($response->errors));
        }
    }

    private function getApiUrl($url)
    {
        if ($url === 'oauth/access_scopes.json') {
            return "/admin/{$url}";
        }

        return "/admin/api/{$this->apiVersion}/{$url}";
    }
}
