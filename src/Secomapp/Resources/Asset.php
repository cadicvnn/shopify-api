<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class Asset extends BaseResource
{
    /**
     * Receive a list of all Assets.
     *
     * @param string $themeId The id of the theme that the asset belongs to
     * @param string $fields  comma-separated list of fields to include in the response
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($themeId, $fields = null)
    {
        return $this->client->get("themes/{$themeId}/assets.json", 'assets', $this->prepareParams($fields));
    }

    /**
     * Receive a single Asset.
     *
     * @param string $themeId The id of the theme that the asset belongs to
     * @param string $key     The key value of the asset, e.g. 'templates/index.liquid' or 'assets/bg-body.gif'.
     * @param string $fields  A comma-separated list of fields to return.
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function get($themeId, $key, $fields = null)
    {
        return $this->client->get("themes/{$themeId}/assets.json?asset[key]={$key}&theme_id={$themeId}", 'asset', $this->prepareParams($fields));
    }

    /**
     * Creating or Modifying an Asset.
     *
     * @param string $themeId The id of the theme that the asset belongs to.
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function createOrUpdate($themeId, $params)
    {
        return $this->client->put("themes/{$themeId}/assets.json", 'asset', [
            'asset' => $params,
        ]);
    }

    /**
     * Remove a Asset from the database.
     *
     * @param string $themeId The id of the theme that the asset belongs to.
     * @param string $key     The key value of the asset, e.g. 'templates/index.liquid' or 'assets/bg-body.gif'.
     *
     * @throws ShopifyApiException
     */
    public function delete($themeId, $key)
    {
        $this->client->delete("themes/{$themeId}/assets.json?asset[key]={$key}");
    }
}
