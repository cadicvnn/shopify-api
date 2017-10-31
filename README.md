# Shopify API

A simple [Shopify API](http://api.shopify.com/) client in PHP.

## Requirements

* PHP 5.4 (or higher)
* ext-curl, ext-json

## Installation

Get the library via `Composer`

```bash
composer require secomapp/shopify-api
```

## Usage

First you will need to initialise the client like this:

```php
$client = new \Secomapp\ClientApi($clientSecret, $shopName, $accessToken);
```

Then you can begin making requests like shown below. 

```php
$orderApi = new \Secomapp\Resources\Order($client);
$oders = $orderApi->all();
```

