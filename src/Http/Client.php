<?php

namespace Freshsales\Http;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Class Client
 *
 * @package Freshsales\Http
 */
class Client implements HttpClientInterface
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * Client constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->httpClient = new GuzzleClient([
            'base_uri' => $config['domain'],
            'headers' => [
                'Authorization' => 'Token token=' . $config['app_token'],
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    /**
     * post
     *
     * @param string $path
     * @param array $data
     * @param array $headers
     * @return Response
     */
    public function post(string $path, array $data = [], array $headers = []): Response
    {
        $response = $this->httpClient->post($path, ['json' => $data]);

        return new Response($response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * post
     *
     * @param string $path
     * @param array $data
     * @param array $headers
     * @return Response
     */
    public function put(string $path, array $data = [], array $headers = []): Response
    {
        $response = $this->httpClient->put($path, ['json' => $data]);

        return new Response($response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * get
     *
     * @param string $path
     * @param array $data
     * @param array $headers
     * @return Response
     */
    public function get(string $path, array $data = [], array $headers = []): Response
    {
        $response = $this->httpClient->get($path, ['json' => $data]);

        return new Response($response->getStatusCode(), $response->getBody()->getContents());
    }
}
