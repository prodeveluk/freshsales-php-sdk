<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Freshsales\Client\Freshsales;
use Freshsales\Example\Config;
use Freshsales\Fields\DealFields;
use Freshsales\Model\Deal;

$config = Config::getCredentials();
$client = new Freshsales($config);

try {
    $dealId = 13000018964;
    $dealData = [
        'name' => 'Updated Name',
        'amount' => 100,
        DealFields::CONTACT_ADDED_LIST => [13000254988]
    ];
    $deal = new Deal($dealData);
    $updatedDeal = $client->deals->update($dealId, $deal);
    var_dump($updatedDeal);
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}
