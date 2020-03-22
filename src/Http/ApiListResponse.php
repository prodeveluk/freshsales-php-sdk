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
    private $items;

    /**
     * @var array
     */
    private $metaData;

    /**
     * ApiListResponse constructor.
     *
     * @param array $items
     * @param array $metaData
     */
    public function __construct(array $items, array $metaData = [])
    {
        $this->items = $items;
        $this->metaData = $metaData;
    }

    /**
     * Get elements
     *
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
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
