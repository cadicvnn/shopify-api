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
     * @param string $url
     * @param string $extract
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return mixed
     */
    public function get($url, $extract, $params = []);

    /**
     * @param string $url
     * @param string $extract
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return mixed
     */
    public function post($url, $extract = null, $params = []);

    /**
     * @param string      $url
     * @param string|bool $extract
     * @param array       $params
     *
     * @throws ShopifyApiException
     *
     * @return mixed
     */
    public function put($url, $extract = null, $params = []);

    /**
     * @param string $url
     * @param array  $params
     *
     * @throws ShopifyApiException
     */
    public function delete($url, $params = []);
}
