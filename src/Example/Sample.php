<?php

require (__DIR__ . '/../../vendor/autoload.php');

$config = [
    'domain' => 'https://neyra-koval.freshsales.io',
    'app_token' => 'PkufZJfRg_Xk6bhohOkFWA'
];
$viewId = 13000164823;

$client = new \Freshsales\Client\Freshsales($config);

//$leadListResponse = $client->leads->list($viewId);
//var_dump($leadListResponse->getElements());

$dealStages = $client->settings->dealFields();
var_dump($dealStages->getItems());
