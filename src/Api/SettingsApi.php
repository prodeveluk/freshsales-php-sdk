<?php

namespace Freshsales\Api;

use Freshsales\Http\HttpClientInterface;
use Freshsales\Http\ApiListResponse;
use Freshsales\Model\ContactField;
use Freshsales\Model\DealField;

/**
 * Class SettingsApi
 *
 * @package Freshsales\Api
 */
class SettingsApi
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
     * Get deal fields
     *
     * @return ApiListResponse
     */
    public function dealFields(): ApiListResponse
    {
        $response = $this->httpClient->get($this->createUrl('/deals/fields?include=field_group'), []);
        $data = json_decode($response->getData(), true);
        $dealFields = $data['fields'] ?? [];
        $fields = [];

        foreach ($dealFields as $dealField) {
            $fields[] = new DealField($dealField);
        }

        return new ApiListResponse($fields);
    }

    /**
     * Get contact fields
     *
     * @return ApiListResponse
     */
    public function contactFields(): ApiListResponse
    {
        $response = $this->httpClient->get($this->createUrl('/contacts/fields?include=field_group'), []);
        $data = json_decode($response->getData(), true);
        $contactFields = $data['fields'] ?? [];
        $fields = [];

        foreach ($contactFields as $contactField) {
            $fields[] = new ContactField($contactField);
        }

        return new ApiListResponse($fields);
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

        return '/api/settings/' . $preparedPath;
    }
}
