<?php

namespace Freshsales\Api;

use Freshsales\Http\HttpClientInterface;
use Freshsales\Http\ApiListResponse;
use Freshsales\Model\DealStage;

/**
 * Class ConfigurationsApi
 *
 * @package Freshsales\Api
 */
class ConfigurationsApi
{
    /**
     * @var HttpClientInterface
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
     * Get deal stages
     *
     * @return ApiListResponse
     */
    public function dealStages(): ApiListResponse
    {
        $response = $this->httpClient->get($this->createUrl('/deal_stages/'), []);
        $data = json_decode($response->getData(), true);
        $dealStages = $data['deal_stages'] ?? [];
        $stages = [];

        foreach ($dealStages as $dealStage) {
            $stages[] = new DealStage($dealStage);
        }

        return new ApiListResponse($stages);
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

        return '/api/selector/' . $preparedPath;
    }
}
