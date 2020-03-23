<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Freshsales\Client\Freshsales;
use Freshsales\Example\Config;
use Freshsales\Fields\ContactFields;

$config = Config::getCredentials();
$client = new Freshsales($config);

try {
    $contacts = $client->search->contacts(ContactFields::EMAIL, 'test@test.com');

    var_dump($contacts->getItems(), $contacts->getMetaData());
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}

try {
    $contacts = $client->search->contacts(ContactFields::MOBILE_PHONE, '3234234');

    var_dump($contacts->getItems(), $contacts->getMetaData());
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}