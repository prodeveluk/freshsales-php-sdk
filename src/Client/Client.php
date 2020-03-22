<?php

namespace Freshsales\Client;

use Freshsales\Api\ConfigurationsApi;
use Freshsales\Api\ContactsApi;
use Freshsales\Api\DealsApi;
use Freshsales\Api\LeadsApi;
use Freshsales\Api\SettingsApi;
use Freshsales\Http\Client as HttpClient;

/**
 * Class Client
 *
 * @package Freshsales\Client
 */
class Client
{
    /**
     * @var ConfigurationsApi
     */
    public $configurations;

    /**
     * @var SettingsApi
     */
    public $settings;

    /**
     * @var LeadsApi
     */
    public $leads;

    /**
     * @var DealsApi
     */
    public $deals;

    /**
     * @var ContactsApi
     */
    public $contacts;

    /**
     * Client constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $httpClient = new HttpClient($config);

        $this->configurations = new ConfigurationsApi($httpClient);
        $this->settings = new SettingsApi($httpClient);

        $this->leads = new LeadsApi($httpClient);
        $this->deals = new DealsApi($httpClient);
        $this->contacts = new ContactsApi($httpClient);
    }
}
