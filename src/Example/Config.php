<?php

namespace Freshsales\Example;

use Symfony\Component\Dotenv\Dotenv;

/**
 * Class Config
 *
 * @package Freshsales\Example
 */
class Config
{
    /**
     * Get credentials
     *
     * @return array
     */
    public static function getCredentials(): array
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/.env');

        return [
            'domain' => $_ENV['DOMAIN'],
            'app_token' => $_ENV['APP_TOKEN']
        ];
    }
}
