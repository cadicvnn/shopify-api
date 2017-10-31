<?php

namespace Secomapp\Contracts;


interface ClientApiContract
{
    public function isValidRequest($params);

    public function isValidProxyRequest($param);

    public function setShopName($shopName);

    public function setAccessToken($accessToken);

    public function setClientSecret($secret);

    public function get($url, $extract, $params = []);

    public function post($url, $extract, $params = []);

    public function put($url, $extract, $params = []);

    public function delete($url, $params = []);
}