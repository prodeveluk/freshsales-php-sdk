<?php

namespace Freshsales\Api;

use Freshsales\Http\HttpClientInterface;
use Freshsales\Http\ApiListResponse;
use Freshsales\Model\Lead;

/**
 * Class LeadsApi
 *
 * @package Freshsales\Api
 */
class LeadsApi
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
        $leadsResponse = $data['leads'] ?? [];
        $leads = [];

        foreach ($leadsResponse as $leadResponse) {
            $leads[] = new Lead($leadResponse);
        }

        return new ApiListResponse($leads, $data['meta'] ?? []);
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

        return '/api/leads/' . $preparedPath;
    }
}
