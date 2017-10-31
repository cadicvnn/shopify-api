<?php

namespace Secomapp\Resources;


use Secomapp\BaseResource;

class Shop extends BaseResource
{
    public function get()
    {
        return $this->client->get('shop.json', 'shop');
    }

    public function uninstallApp()
    {
        return $this->client->get('api_permissions/current.json', 'shop');
    }
}