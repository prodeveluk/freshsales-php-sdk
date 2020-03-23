<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Freshsales\Client\Freshsales;
use Freshsales\Example\Config;

$config = Config::getCredentials();
$client = new Freshsales($config);

try {
    $queryParameters = [
        'sort' => 'id',
        'sort_type' => 'asc',
        'per_page' => 1000,
    ];
    $dealsListResponse = $client->deals->filters($queryParameters);
    var_dump($dealsListResponse->getItems(), $dealsListResponse->getMetaData());
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}