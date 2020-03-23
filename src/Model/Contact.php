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

    /**
     * getWorkPhone
     *
     * @return string|null
     */
    public function getWorkPhone(): ?string
    {
        return $this->data['work_number'] ?? null;
    }

    /**
     * getMobilePhone
     *
     * @return string|null
     */
    public function getMobilePhone(): ?string
    {
        return $this->data['mobile_number'] ?? null;
    }
}
