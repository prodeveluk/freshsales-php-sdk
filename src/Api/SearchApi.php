<?php

namespace Freshsales\Api;

use Freshsales\Fields\ContactFields;
use Freshsales\Http\ApiListResponse;
use Freshsales\Model\Contact;

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
     */
    protected function getBaseApiPath(): string
    {
        return '/api/filtered_search/';
    }
}
