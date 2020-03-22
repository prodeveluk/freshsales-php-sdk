<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Freshsales\Client\Freshsales;
use Freshsales\Example\Config;

$config = Config::getCredentials();
$allDealsViewId = 13000164848;
$client = new Freshsales($config);

try {
    $dealsListResponse = $client->deals->list($allDealsViewId);
    var_dump($dealsListResponse->getMetaData(), $dealsListResponse->getItems());
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}