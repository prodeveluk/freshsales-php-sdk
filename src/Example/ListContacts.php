<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Freshsales\Client\Freshsales;
use Freshsales\Example\Config;

$config = Config::getCredentials();
$allContactsViewId = 13000164838;
$client = new Freshsales($config);

try {
    $queryParameters = [
        'sort' => 'email',
        'sort_type' => 'desc',
        'page' => 1,
        'per_page' => 1000,
        'fields' => 'email'
    ];
    $contactsListResponse = $client->contacts->list($allContactsViewId, $queryParameters);
    var_dump($contactsListResponse->getItems(), $contactsListResponse->getMetaData());
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}

try {
    $queryParameters = [
        'sort' => 'email',
        'sort_type' => 'desc',
        'page' => 1,
        'per_page' => 1000,
        'fields' => 'email'
    ];
    $contactsListGenerator = $client->contacts->listGenerator($allContactsViewId, $queryParameters);

    foreach ($contactsListGenerator as $contact) {
        var_dump($contact);
    }
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}