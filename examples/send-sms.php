<?php

require __DIR__ . '/../vendor/autoload.php';

use Smstools\Client;

$smstools = new Client('your-client-id', 'your-client-secret');

// SMS versturen
$response = $smstools->sms()->send(
    to: '32470000000',
    message: 'Testbericht via de PHP SDK!',
    sender: 'Smstools'
);

print_r($response);

// Balance ophalen
print_r($smstools->balance()->get());
