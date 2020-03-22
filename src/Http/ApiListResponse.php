<?php

namespace Freshsales\Http;

/**
 * Class ApiListResponse
 *
 * @package Freshsales\Http
 */
class ApiListResponse
{
    /**
     * @var array
     */
    private $elements;

    /**
     * @var array
     */
    private $metaData;

    /**
     * ApiListResponse constructor.
     *
     * @param array $elements
     * @param array $metaData
     */
    public function __construct(array $elements, array $metaData = [])
    {
        $this->elements = $elements;
        $this->metaData = $metaData;
    }

    /**
     * Get elements
     *
     * @return array
     */
    public function getElements(): array
    {
        return $this->elements;
    }

    /**
     * Get metaData
     *
     * @return array
     */
    public function getMetaData(): array
    {
        return $this->metaData;
    }
}
