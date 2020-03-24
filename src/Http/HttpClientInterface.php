<?php

namespace Freshsales\Http;

/**
 * Interface HttpClientInterface
 *
 * @package Freshsales\Http
 */
interface HttpClientInterface
{
    /**
     * post
     *
     * @param string $url
     * @param array $data
     * @param array $headers
     * @return Response
     */
    public function post(string $url, array $data = [], array $headers = []): Response;

    /**
     * post
     *
     * @param string $url
     * @param array $data
     * @param array $headers
     * @return Response
     */
    public function put(string $url, array $data = [], array $headers = []): Response;

    /**
     * get
     *
     * @param string $url
     * @param array $data
     * @param array $headers
     * @return Response
     */
    public function get(string $url, array $data = [], array $headers = []): Response;
}
