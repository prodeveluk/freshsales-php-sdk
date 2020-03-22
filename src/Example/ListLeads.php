<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Freshsales\Client\Freshsales;
use Freshsales\Example\Config;

$config = Config::getCredentials();
$allLeadsViewId = 13000164826;
$client = new Freshsales($config);

try {
    $dealsListResponse = $client->deals->list($allLeadsViewId);
    var_dump($dealsListResponse->getMetaData(), $dealsListResponse->getItems());
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}