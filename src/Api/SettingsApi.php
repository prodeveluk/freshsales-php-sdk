<?php

namespace Freshsales\Api;

use Freshsales\Http\ApiListResponse;
use Freshsales\Model\ContactField;
use Freshsales\Model\DealField;

/**
 * Class SettingsApi
 *
 * @package Freshsales\Api
 */
class SettingsApi extends AbstractApi
{
    /**
     * Get deal fields
     *
     * @return ApiListResponse
     */
    public function dealFields(): ApiListResponse
    {
        $url = $this->createUrl('/deals/fields?include=field_group');
        $response = $this->getFromApi($url);
        $dealFields = $response['fields'] ?? [];
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
        $url = $this->createUrl('/contacts/fields?include=field_group');
        $response = $this->getFromApi($url);
        $contactFields = $response['fields'] ?? [];
        $fields = [];

        foreach ($contactFields as $contactField) {
            $fields[] = new ContactField($contactField);
        }

        return new ApiListResponse($fields);
    }

    /**
     * {@inheritDoc}
     */
    protected function getBaseApiPath(): string
    {
        return '/api/settings/';
    }
}
