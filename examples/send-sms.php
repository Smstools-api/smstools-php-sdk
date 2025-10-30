<?php

require __DIR__ . '/../vendor/autoload.php';

use Smstools\Client;

$smstools = new Client('your-client-id', 'your-client-secret');

// Send Message
$response = $smstools->sms()->send(
    to: '32470000000',
    message: 'Hello world!',
    sender: 'Smstools'
);

print_r($response);

// Get Balance
print_r($smstools->balance()->get());
