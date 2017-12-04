<?php

namespace Secomapp\Contracts;

use Secomapp\Exceptions\ShopifyApiException;

interface ClientApiContract
{
    public function isValidRequest($params);

    public function isValidProxyRequest($param);

    public function setShopName($shopName);

    public function setAccessToken($accessToken);

    public function setClientSecret($secret);

    /**
     * @param $url
     * @param $extract
     * @param array $params
     *
     * @return mixed
     * @throws ShopifyApiException
     */
    public function get($url, $extract, $params = []);

    /**
     * @param $url
     * @param $extract
     * @param array $params
     *
     * @return mixed
     * @throws ShopifyApiException
     */
    public function post($url, $extract = null, $params = []);

    /**
     * @param $url
     * @param $extract
     * @param array $params
     *
     * @return mixed
     * @throws ShopifyApiException
     */
    public function put($url, $extract, $params = []);

    /**
     * @param $url
     *
     * @param array $params
     * @throws ShopifyApiException
     */
    public function delete($url, $params = []);
}
