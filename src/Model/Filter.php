<?php

namespace Freshsales\Model;

/**
 * Class Filter
 *
 * @package Freshsales\Model
 */
class Filter extends AbstractApiObject
{
    /**
     * Get name
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getFieldValue('name');
    }
}
