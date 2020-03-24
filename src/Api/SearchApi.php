<?php

namespace Freshsales\Api;

use Freshsales\Fields\ContactFields;
use Freshsales\Fields\DealFields;
use Freshsales\Http\ApiListResponse;
use Freshsales\Model\Contact;
use Freshsales\Model\Deal;

/**
 * Class SearchApi
 *
 * @package Freshsales\Api
 */
class SearchApi extends AbstractApi
{
    /**
     * {@inheritDoc}
     */
    public function contacts(string $searchByField, string $searchValue): ApiListResponse
    {
        $url = $this->createUrl('/contact');
        $attribute = $searchByField;

        if ($searchByField === ContactFields::EMAIL) {
            $attribute = 'contact_email.email';
        }

        $parameters = [
            'filter_rule' => [
                ['attribute' => $attribute, 'operator' => 'is_in', 'value' => $searchValue]
            ]
        ];
        $response = $this->postToApi($url, $parameters);
        $contacts = [];

        foreach ($response['contacts'] ?? [] as $contactData) {
            $contacts[] = new Contact($contactData);
        }

        return new ApiListResponse($contacts, $data['meta'] ?? []);
    }

    /**
     * {@inheritDoc}
     *
     * @TODO: Not working with updated at. Work in progress
     */
    public function lastModifiedDeals(string $minUpdatedAt): ApiListResponse
    {
        $url = $this->createUrl('/deal');

        $parameters = [
            'filter_rule' => [
                ['attribute' => DealFields::UPDATED_AT, 'operator' => 'is_in', 'value' => $minUpdatedAt]
            ]
        ];
        $response = $this->postToApi($url, $parameters);
        $deals = [];

        foreach ($response['deals'] ?? [] as $dealData) {
            $deals[] = new Deal($dealData);
        }

        return new ApiListResponse($deals, $data['meta'] ?? []);
    }

    /**
     * {@inheritDoc}
     */
    protected function getBaseApiPath(): string
    {
        return '/api/filtered_search/';
    }
}
