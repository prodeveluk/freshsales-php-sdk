<?php

namespace Freshsales\Api;

use Freshsales\Http\ApiListResponse;
use Freshsales\Model\Lead;

/**
 * Class LeadsApi
 *
 * @package Freshsales\Api
 */
class LeadsApi extends AbstractObjectApi
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
        $leads = [];

        foreach ($response['leads'] ?? [] as $leadData) {
            $leads[] = new Lead($leadData);
        }

        return new ApiListResponse($leads, $data['meta'] ?? []);
    }

    /**
     * Create
     *
     * @param Lead $lead
     * @return int
     */
    public function create(Lead $lead): int
    {
        $url = $this->createUrl('');
        $response = $this->postToApi($url, $lead->asArray());

        return $response['lead']['id'];
    }

    /**
     * {@inheritDoc}
     */
    protected function getBaseApiPath(): string
    {
        return '/api/leads/';
    }
}
