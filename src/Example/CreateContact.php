<?php

require (__DIR__ . '/../../vendor/autoload.php');

use Freshsales\Client\Freshsales;
use Freshsales\Example\Config;
use Freshsales\Model\Contact;

$config = Config::getCredentials();
$client = new Freshsales($config);

try {
    $contactData = [
        'id' => 1,
        'first_name' => 'Test3',
        'last_name' => 'User3',
        'mobile_number' => '3-625-555-9503',
        'custom_field' => [
            'cf_val1' => 'test',
            'cf_val2' => 'test2'
        ]
    ];
    $contact = new Contact($contactData);
    $createdContactId = $client->contacts->create($contact);
    var_dump($createdContactId);
} catch (Throwable $e) {
    var_dump($e->getCode(), $e->getMessage());
}
