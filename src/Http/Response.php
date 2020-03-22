<?php

namespace Freshsales\Http;

/**
 * Class Response
 *
 * @package Freshsales\Http
 */
class Response
{
    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var string
     */
    private $data;

    /**
     * Response constructor.
     *
     * @param int $statusCode
     * @param string $data
     */
    public function __construct(int $statusCode, string $data)
    {
        $this->statusCode = $statusCode;
        $this->data = $data;
    }

    /**
     * Get statusCode
     *
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }
}
