<?php

namespace Freshsales\Api;

use Freshsales\Http\ApiListResponse;
use Freshsales\Model\Contact;

/**
 * Class ContactsApi
 *
 * @package Freshsales\Api
 */
class ContactsApi extends AbstractObjectApi
{
    /**
     * {@inheritDoc}
     */
    public function list(int $viewId, array $queryParameters = []): ApiListResponse
    {
        $parameters = $queryParameters;
        $parameters['per_page'] = 1000;
        $url = $this->createUrl('/view/'. $viewId, $parameters);

        $response = $this->getFromApi($url, []);
        $contacts = [];

        foreach ($response['contacts'] ?? [] as $contactData) {
            $contacts[] = new Contact($contactData);
        }

        return new ApiListResponse($contacts, $data['meta'] ?? []);
    }

    /**
     * Create
     *
     * @param Contact $contact
     * @return Contact Contact
     */
    public function create(Contact $contact): Contact
    {
        $url = $this->createUrl('');
        $response = $this->postToApi($url, ['contact' => $contact->asArray()]);

        return new Contact($response['contact']);
    }

    /**
     * Update
     *
     * @param $contactId
     * @param Contact $contact
     * @return Contact Contact ID
     */
    public function update($contactId, Contact $contact): Contact
    {
        $url = $this->createUrl((string)$contactId);
        $response = $this->putToApi($url, ['contact' => $contact->asArray()]);

        return new Contact($response['contact']);
    }

    /**
     * {@inheritDoc}
     */
    protected function getBaseApiPath(): string
    {
        return '/api/contacts/';
    }
}
