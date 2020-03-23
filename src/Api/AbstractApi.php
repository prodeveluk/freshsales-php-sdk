<?php

namespace Freshsales\Api;

use Freshsales\Http\HttpClientInterface;

/**
 * Class AbstractApi
 *
 * @package Freshsales\Api
 */
abstract class AbstractApi
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * AbstractApi constructor.
     *
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Get from api
     *
     * @param string $url
     * @param array $data
     * @param array $headers
     * @return array
     */
    public function getFromApi(string $url, array $data = [], array $headers = []): array
    {
        $response = $this->httpClient->get($url, $data, $headers);

        return json_decode($response->getData(), true);
    }

    /**
     * Post to api
     *
     * @param string $url
     * @param array $data
     * @param array $headers
     * @return array
     */
    public function postToApi(string $url, array $data = [], array $headers = []): array
    {
        $response = $this->httpClient->post($url, $data, $headers);

        return json_decode($response->getData(), true);
    }

    /**
     * Create url
     *
     * @param string $path
     * @param array $query
     * @return string
     */
    protected function createUrl(string $path, array $query = []): string
    {
        $preparedPath = trim($path, '/ ');
        $baseApiPath = trim($this->getBaseApiPath(), '/ ');
        $url = '/' . $baseApiPath . '/' . $preparedPath;

        if ($query !== []) {
            return $url . '?' . http_build_query($query);
        }

        return $url;
    }

    /**
     * getBaseApiPath
     *
     * @return string
     */
    abstract protected function getBaseApiPath(): string;
}
