<?php

namespace Freshsales\Api;

use Freshsales\Http\ApiListResponse;
use Generator;

/**
 * Class AbstractApi
 *
 * @package Freshsales\Api
 */
abstract class AbstractObjectApi extends AbstractApi
{
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
