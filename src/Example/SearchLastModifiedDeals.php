<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Freshsales\Client\Freshsales;
use Freshsales\Example\Config;

$config = Config::getCredentials();
$client = new Freshsales($config);

try {
    // @TODO: Not finished. Work in progress
    $deals = $client->search->lastModifiedDeals('2020-03-24T00:00:00Z');

    var_dump($deals->getItems(), $deals->getMetaData());
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}