<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Freshsales\Client\Freshsales;
use Freshsales\Example\Config;

$config = Config::getCredentials();
$client = new Freshsales($config);

try {
    $currenciesResponse = $client->configurations->currencies();
    var_dump($currenciesResponse->getMetaData(), $currenciesResponse->getItems());
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}