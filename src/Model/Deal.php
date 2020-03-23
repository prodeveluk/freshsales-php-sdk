<?php

namespace Freshsales\Model;

use Freshsales\Fields\BaseFields;
use Freshsales\Fields\DealFields;

/**
 * Class Deal
 *
 * @package Freshsales\Model
 */
class Deal extends AbstractApiObject
{
    /**
     * Get CreatedAt
     *
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->getFieldValue(DealFields::CREATED_AT);
    }

    /**
     * Get UpdatedAt
     *
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getFieldValue(DealFields::UPDATED_AT);
    }

    /**
     * Get Amount
     *
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->getFieldValue(DealFields::AMOUNT);
    }

    /**
     * Get StageId
     *
     * @return int|null
     */
    public function getStageId(): ?int
    {
        return $this->getFieldValue(DealFields::STAGE_ID);
    }

    /**
     * Get CurrencyId
     *
     * @return int|null
     */
    public function getCurrencyId(): ?int
    {
        return$this->getFieldValue(DealFields::CURRENCY_ID);
    }

    /**
     * Get ContactIds
     *
     * @return Contact|null
     */
    public function getContactIds(): ?array
    {
        return $this->getFieldValue(DealFields::CONTACT_IDS);
    }
}
