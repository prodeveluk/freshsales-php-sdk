<?php

namespace Freshsales\Api;

use Freshsales\Http\HttpClientInterface;
use Freshsales\Http\ApiListResponse;

/**
 * Class ContactsApi
 *
 * @package Freshsales\Api
 */
class ContactsApi
{
    /**
     * @var
     */
    private $httpClient;

    /**
     * LeadsApi constructor.
     *
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * List all
     *
     * @param int $viewId
     * @return ApiListResponse
     */
    public function list(int $viewId): ApiListResponse
    {
        $response = $this->httpClient->get($this->createUrl('/view/' . $viewId), []);
        $data = json_decode($response->getData(), true);

        return new ApiListResponse($data['contacts'] ?? [], $data['meta'] ?? []);
    }

    /**
     * Create url
     *
     * @param string $path
     * @return string
     */
    private function createUrl(string $path): string
    {
        $preparedPath = trim($path, '/');

        return '/api/contacts/' . $preparedPath;
    }
}
