<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Freshsales\Client\Freshsales;
use Freshsales\Example\Config;
use Freshsales\Model\Deal;

$config = Config::getCredentials();
$allDealsViewId = 13000164850;
$client = new Freshsales($config);

try {
    $queryParameters = [];
    $dealsListResponse = $client->deals->list($allDealsViewId, $queryParameters);
    var_dump($dealsListResponse->getMetaData(), $dealsListResponse->getItems());
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}

try {
    $queryParameters = [
        'include' => 'contacts'
    ];
    $dealsListGenerator = $client->deals->listGenerator($allDealsViewId, $queryParameters);

    /**
     * @var Deal $deal
     */
    foreach ($dealsListGenerator as $deal) {
        var_dump($deal,
            $deal->getAmount(),
            $deal->getCreatedAt(),
            $deal->getUpdatedAt(),
            $deal->getContactIds()
        );
    }
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}