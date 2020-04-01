<?php

namespace Secomapp\Resources;

use Secomapp\BaseResource;
use Secomapp\Exceptions\ShopifyApiException;
use stdClass;

class Article extends BaseResource
{
    /**
     * Retrieves a list of all articles from a blog.
     *
     * @param string $blogId The Id of the blog will be associated with.
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function all($blogId, $params = [])
    {
        return $this->client->get("blogs/{$blogId}/articles.json", 'articles', $params);
    }

    /**
     * Retrieves a count of all articles from a blog.
     *
     * @param string $blogId The Id of the blog will be associated with.
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return int
     */
    public function count($blogId, $params = [])
    {
        return $this->client->get("blogs/{$blogId}/articles/count.json", 'count', $params);
    }

    /**
     * Receive a single Article.
     *
     * @param string $blogId
     * @param string $articleId
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function get($blogId, $articleId)
    {
        return $this->client->get("blogs/{$blogId}/articles/{$articleId}.json", 'article');
    }

    /**
     * Creates an article for a blog.
     *
     * @param string $blogId
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function create($blogId, $params)
    {
        return $this->client->post("blogs/{$blogId}/articles.json", 'article', [
            'article' => $params,
        ]);
    }

    /**
     * Updates an article.
     *
     * @param string $blogId
     * @param string $articleId
     * @param array  $params
     *
     * @throws ShopifyApiException
     *
     * @return stdClass
     */
    public function update($blogId, $articleId, $params)
    {
        return $this->client->put("blogs/{$blogId}/articles/{$articleId}.json", 'article', [
            'article' => $params,
        ]);
    }

    /**
     * Retrieves a list all of article authors.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function authors($params = [])
    {
        return $this->client->get('articles/authors.json', 'authors', $params);
    }

    /**
     * Retrieves a list of all the tags.
     *
     * @param array $params
     *
     * @throws ShopifyApiException
     *
     * @return array
     */
    public function tags($params = [])
    {
        return $this->client->get('articles/tags.json', 'tags', $params);
    }

    /**
     * Delete an article.
     *
     * @param string $blogId
     * @param string $articleId
     *
     * @throws ShopifyApiException
     */
    public function delete($blogId, $articleId)
    {
        $this->client->delete("blogs/{$blogId}/articles/{$articleId}.json");
    }
}
