<?php

namespace Freshsales\Api;

use Freshsales\Http\HttpClientInterface;
use Freshsales\Http\ApiListResponse;
use Freshsales\Http\Response;
use Freshsales\Model\Deal;

/**
 * Class DealsApi
 *
 * @package Freshsales\Api
 */
class DealsApi
{
    /**
     * @var
     */
    private $httpClient;

    /**
     * DealsApi constructor.
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

        return new ApiListResponse($data['deals'] ?? [], $data['meta'] ?? []);
    }

    /**
     * Create
     *
     * @param Deal $deal
     * @return Response
     */
    public function create(Deal $deal): Response
    {
        return $this->httpClient->post($this->createUrl(''), $deal->asArray());
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

        return '/api/deals/' . $preparedPath;
    }
}
