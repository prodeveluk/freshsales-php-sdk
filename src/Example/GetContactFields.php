<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Freshsales\Client\Freshsales;
use Freshsales\Example\Config;

$config = Config::getCredentials();
$client = new Freshsales($config);

try {
    $contactFields = $client->settings->contactFields();

    var_dump($contactFields->getItems());
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}