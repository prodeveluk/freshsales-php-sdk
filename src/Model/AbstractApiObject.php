<?php

namespace Freshsales\Model;

/**
 * Class AbstractApiObject
 *
 * @package Freshsales\Model
 */
abstract class AbstractApiObject
{
    /**
     * @var array|null
     */
    protected $data;

    /**
     * AbstractApiObject constructor.
     *
     * @param array|null $data
     */
    public function __construct(?array $data)
    {
        $this->data = $data;
    }

    /**
     * Get id
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->data['id'] ?? null;
    }

    /**
     * Get field value
     *
     * @param string $field
     * @return mixed|null
     */
    public function getFieldValue(string $field)
    {
        return (is_array($this->data) && array_key_exists($field, $this->data)) ? $this->data[$field] : null;
    }

    /**
     * Get as array
     *
     * @return array
     */
    public function asArray(): array
    {
        return $this->data ?? [];
    }
}
