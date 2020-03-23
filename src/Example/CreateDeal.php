<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Freshsales\Client\Freshsales;
use Freshsales\Example\Config;
use Freshsales\Fields\DealFields;
use Freshsales\Model\Contact;
use Freshsales\Model\Deal;

$config = Config::getCredentials();
$client = new Freshsales($config);

try {
    $dealData = [
        'name' => 'Test Deal',
        'amount' => 0,
        DealFields::CONTACT_ADDED_LIST => [13000241059]
    ];
    $deal = new Deal($dealData);
    $createdContactId = $client->deals->create($deal);
    var_dump($createdContactId);
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}
