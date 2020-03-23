<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Freshsales\Client\Freshsales;
use Freshsales\Example\Config;

$config = Config::getCredentials();
$client = new Freshsales($config);

try {
    $dealPipelinesListResponse = $client->configurations->dealPipelines();
    var_dump($dealPipelinesListResponse->getItems(), $dealPipelinesListResponse->getMetaData());
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}
