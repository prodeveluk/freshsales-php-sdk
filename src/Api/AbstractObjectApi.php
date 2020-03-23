<?php

namespace Freshsales\Api;

use Freshsales\Http\ApiListResponse;
use Freshsales\Model\Filter;
use Generator;

/**
 * Class AbstractApi
 *
 * @package Freshsales\Api
 */
abstract class AbstractObjectApi extends AbstractApi
{
    /**
     * Get filters
     *
     * @param array $queryParameters
     * @return ApiListResponse
     */
    public function filters(array $queryParameters = []): ApiListResponse
    {
        $parameters = $queryParameters;
        $parameters['per_page'] = 1000;
        $url = $this->createUrl('/filters', $parameters);

        $response = $this->getFromApi($url, []);
        $filters = [];

        foreach ($response['filters'] ?? [] as $filterData) {
            $filters[] = new Filter($filterData);
        }

        return new ApiListResponse($filters, $data['meta'] ?? []);
    }

    /**
     * List all
     *
     * @param int $viewId
     * @param array $queryParameters
     * @return ApiListResponse
     */
    abstract public function list(int $viewId, array $queryParameters = []): ApiListResponse;

    /**
     * List generator
     *
     * @param int $viewId
     * @param array $queryParameters
     * @return Generator
     */
    public function listGenerator(int $viewId, array $queryParameters = []): Generator
    {
        $page = 1;
        $parameters = $queryParameters;
        $parameters['page'] = $page;
        $objectsResponse = $this->list($viewId, $parameters);

        while ($objectsResponse !== null && $objectsResponse->getItems() !== []) {
            foreach ($objectsResponse->getItems() as $object) {
                yield $object;
            }

            if (($objectsResponse->getMetaData()['total_pages'] ?? 0) > $page) {
                $page++;
                $parameters['page'] = $page;
                $objectsResponse = $this->list($viewId, $parameters);
            } else {
                $objectsResponse = null;
            }
        }
    }
}
