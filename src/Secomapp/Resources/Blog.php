<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class Blog extends BaseResource
{
    /**
     * Receive a list of all Blogs.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($params = [])
    {
        return $this->client->get('blogs.json', 'blogs', $params);
    }

    /**
     * Receive a count of all Blogs.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return int
     */
    public function count($params = [])
    {
        return $this->client->get('blogs/count.json', 'count', $params);
    }

    /**
     * Get a single blog by its ID.
     *
     * @param string $blogId
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function get($blogId)
    {
        return $this->client->get("blogs/{$blogId}.json", 'blog');
    }

    /**
     * Create a new blog.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($params)
    {
        return $this->client->post('blogs.json', 'blog', [
            'blog' => $params,
        ]);
    }

    /**
     * Update a blog.
     *
     * @param string $blogId
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function update($blogId, $params)
    {
        return $this->client->put("blogs/{$blogId}.json", 'blog', [
            'blog' => $params,
        ]);
    }

    /**
     * Delete a blog.
     *
     * @param string $blogId
     *
     * @throws ShopifyApiException
     */
    public function delete($blogId)
    {
        $this->client->delete("blogs/{$blogId}.json");
    }
}
