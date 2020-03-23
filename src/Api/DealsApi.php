<?php

namespace Freshsales\Api;

use Freshsales\Http\ApiListResponse;
use Freshsales\Model\Deal;

/**
 * Class DealsApi
 *
 * @package Freshsales\Api
 */
class DealsApi extends AbstractObjectApi
{
    /**
     * {@inheritDoc}
     */
    public function list(int $viewId, array $queryParameters = []): ApiListResponse
    {
        $parameters = $queryParameters;
        $parameters['per_page'] = 1000;
        $url = $this->createUrl('/view/' . $viewId, $parameters);

        $response = $this->getFromApi($url, []);
        $deals = [];

        foreach ($response['deals'] ?? [] as $dealData) {
            $deals[] = new Deal($dealData);
        }

        return new ApiListResponse($deals, $data['meta'] ?? []);
    }

    /**
     * Create
     *
     * @param Deal $deal
     * @return int
     */
    public function create(Deal $deal): int
    {
        $url = $this->createUrl('');
        $response = $this->postToApi($url, $deal->asArray());

        return $response['deal']['id'];
    }

    /**
     * {@inheritDoc}
     */
    protected function getBaseApiPath(): string
    {
        return '/api/deals/';
    }
}
