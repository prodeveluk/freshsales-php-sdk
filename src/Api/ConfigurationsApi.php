<?php

namespace Freshsales\Api;

use Freshsales\Http\ApiListResponse;
use Freshsales\Model\Currency;
use Freshsales\Model\DealPipeline;
use Freshsales\Model\DealStage;

/**
 * Class ConfigurationsApi
 *
 * @package Freshsales\Api
 */
class ConfigurationsApi extends AbstractApi
{
    /**
     * Get deal stages
     *
     * @return ApiListResponse
     */
    public function dealStages(): ApiListResponse
    {
        $url = $this->createUrl('/deal_stages');
        $response = $this->getFromApi($url);
        $dealStages = $response['deal_stages'] ?? [];
        $stages = [];

        foreach ($dealStages as $dealStage) {
            $stages[] = new DealStage($dealStage);
        }

        return new ApiListResponse($stages);
    }

    /**
     * Get deal pipelines
     *
     * @return ApiListResponse
     */
    public function dealPipelines(): ApiListResponse
    {
        $url = $this->createUrl('/deal_pipelines');
        $response = $this->getFromApi($url);
        $dealPipelines = $response['deal_pipelines'] ?? [];
        $pipelines = [];

        foreach ($dealPipelines as $dealPipeline) {
            $pipelines[] = new DealPipeline($dealPipeline);
        }

        return new ApiListResponse($pipelines);
    }

    /**
     * Get currencies
     *
     * @return ApiListResponse
     */
    public function currencies(): ApiListResponse
    {
        $queryParameters = [
            'sort' => 'id',
            'sort_type' => 'asc'
        ];
        $url = $this->createUrl('/currencies', $queryParameters);
        $response = $this->getFromApi($url);
        $currenciesData = $response['currencies'] ?? [];
        $currencies = [];

        foreach ($currenciesData as $currencyData) {
            $currencies[] = new Currency($currencyData);
        }

        return new ApiListResponse($currencies);
    }

    /**
     * {@inheritDoc}
     */
    protected function getBaseApiPath(): string
    {
        return '/api/selector/';
    }
}
