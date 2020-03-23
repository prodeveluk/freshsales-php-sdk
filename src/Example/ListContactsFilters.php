<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Freshsales\Client\Freshsales;
use Freshsales\Example\Config;

$config = Config::getCredentials();
$allContactsViewId = 13000164838;
$client = new Freshsales($config);

try {
    $queryParameters = [
        'sort' => 'id',
        'sort_type' => 'asc',
        'per_page' => 1000,
    ];
    $contactsListResponse = $client->contacts->filters($queryParameters);
    var_dump($contactsListResponse->getItems(), $contactsListResponse->getMetaData());
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}