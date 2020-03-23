<?php

namespace Freshsales\Model;

/**
 * Class Contact
 *
 * @package Freshsales\Model
 */
class Contact extends AbstractApiObject
{
    /**
     * getEmail
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->data['email'] ?? null;
    }
}
