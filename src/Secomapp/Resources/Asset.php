<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;

class Asset extends BaseResource
{
    /**
     * Retrieves a list of all objects.
     * Listing theme assets only returns metadata about each asset
     * you need to request assets individually in order to get their contents.
     *
     * @param string      $themeId The id of the theme that the asset belongs to
     * @param string|null $fields  A comma-separated list of fields to return.
     *
     * @return mixed
     */
    public function all($themeId, $fields = null)
    {
        $params = [];
        if ($fields) {
            $params['fields'] = $fields;
        }

        return $this->client->get("themes/{$themeId}/assets.json", 'assets', $params);
    }

    /**
     * Retrieves the asset with the given id.
     *
     * @param string      $themeId The id of the theme that the asset belongs to
     * @param string      $key     The key value of the asset, e.g. 'templates/index.liquid' or 'assets/bg-body.gif'.
     * @param string|null $fields  A comma-separated list of fields to return.
     */
    public function get($themeId, $key, $fields = null)
    {
        $params = $this->prepareFields($fields);

        return $this->client->get("themes/{$themeId}/assets.json?asset[key]={$key}&theme_id={$themeId}", 'asset', $params);
    }

    /**
     * @param string $themeId The id of the theme that the asset belongs to.
     * @param array  $asset
     */
    public function createOrUpdate($themeId, $asset)
    {
        $params = ['asset' => $asset];

        return $this->client->put("themes/{$themeId}/assets.json", 'asset', $params);
    }
}
