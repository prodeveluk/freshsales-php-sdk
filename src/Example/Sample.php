<?php

require (__DIR__ . '/../../vendor/autoload.php');

$config = [
    'domain' => 'api_domain',
    'app_token' => 'api_token'
];
$viewId = 13000164823;

$client = new \Freshsales\Client\Freshsales($config);

//$leadListResponse = $client->leads->list($viewId);
//var_dump($leadListResponse->getElements());

$dealStages = $client->settings->dealFields();
var_dump($dealStages->getItems());
