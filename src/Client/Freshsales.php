<?php

namespace Freshsales\Client;

use Freshsales\Api\AbstractApi;
use Freshsales\Api\ConfigurationsApi;
use Freshsales\Api\ContactsApi;
use Freshsales\Api\DealsApi;
use Freshsales\Api\LeadsApi;
use Freshsales\Api\SearchApi;
use Freshsales\Api\SettingsApi;
use Freshsales\Http\Client as HttpClient;
use Freshsales\Http\HttpClientInterface;

/**
 * Class Freshsales
 *
 * @property ConfigurationsApi $configurations
 * @property SettingsApi $settings
 * @property ContactsApi $contacts
 * @property DealsApi $deals
 * @property LeadsApi $leads
 * @property SearchApi $search
 *
 * @package Freshsales\Client
 */
class Freshsales
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * Freshsales constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->httpClient = new HttpClient($config);
    }

    /**
     * Create Api by calling property
     *
     * @param string $name
     * @return mixed
     */
    public function __get(string $name): AbstractApi
    {
        $classname = '\\Freshsales\\Api\\' . ucfirst($name) . 'Api';

        if (!class_exists($classname)) {
            throw new \InvalidArgumentException('Api not exists: ' . $name);
        }

        return new $classname($this->httpClient);
    }
}
