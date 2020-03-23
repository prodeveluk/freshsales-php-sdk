<?php

namespace Freshsales\Model;

/**
 * Class Currency
 *
 * @package Freshsales\Model
 */
class Currency extends AbstractApiObject
{
    /**
     * Get Code
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->getFieldValue('currency_code');
    }
}
