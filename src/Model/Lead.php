<?php

namespace Freshsales\Model;

/**
 * Class Lead
 *
 * @package Freshsales\Model
 */
class Lead extends AbstractApiObject
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var Company
     */
    private $company;

    /**
     * @var Deal
     */
    private $deal;

    /**
     * Lead constructor.
     *
     * @param array $leadData
     */
    public function __construct(array $leadData)
    {
        parent::__construct($leadData);

        $this->company = new Company($leadData['company'] ?? []);
        $this->deal = new Deal($leadData['deal'] ?? []);
    }

    /**
     * Get Company
     *
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * Get Deal
     *
     * @return Deal
     */
    public function getDeal(): Deal
    {
        return $this->deal;
    }

    /**
     * Get custom field value
     *
     * @param string $customField
     * @return mixed|null
     */
    public function getCustomFieldValue(string $customField)
    {
        return (is_array($this->data['custom_field'] ?? null) && array_key_exists($customField, $this->data['custom_field']))
            ? $this->data['custom_field'][$customField]
            : null;
    }
}
