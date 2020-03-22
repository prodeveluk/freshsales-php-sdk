<?php

namespace Freshsales\Http;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;

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
     * @return mixed
     */
    public function post(string $path, array $data = [], array $headers = []): Response
    {
        return $this->httpClient->post($path, ['json' => $data]);
    }

    /**
     * get
     *
     * @param string $path
     * @param array $data
     * @param array $headers
     * @return mixed
     */
    public function get(string $path, array $data = [], array $headers = []): Response
    {
        try {
            /**
             * @var ResponseInterface $response
             */
            $response = $this->httpClient->get($path, ['json' => $data]);
        } catch (\Throwable $e) {
            return new Response($e->getCode(), $e->getMessage());
        }

        return new Response($response->getStatusCode(), $response->getBody()->getContents());
    }
}
