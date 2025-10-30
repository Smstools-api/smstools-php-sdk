# 📱 Smstools PHP SDK

A simple PHP SDK for the [Smstools.com](https://www.smstools.com) API (v1).  
This client provides an easy way to send SMS or Voice messages and manage your account using your `client_id` and `client_secret`.

---

## 🚀 Installation

### Via Composer
```bash
composer require smstools-api/smstools-php-sdk
```

## 🔧 Configuration
```bash
use Smstools\Client;

$client = new Client(
    clientId: 'YOUR_CLIENT_ID',
    clientSecret: 'YOUR_CLIENT_SECRET',
    baseUrl: 'https://api.smstools.com/v1/' // optional, default value
);
```

## All requests automatically include:

```bash
X-Client-Id: YOUR_CLIENT_ID
X-Client-Secret: YOUR_CLIENT_SECRET
```

## 💬 Examples

### Send an SMS

```php
require 'vendor/autoload.php';

use Smstools\Client;

$client = new Client('your-client-id', 'your-client-secret');

try {
    $response = $client->sms()->send(
        to: '32470000000',
        message: 'Hello World!',
        sender: 'Smstools'
    );

    echo "✅ Message sent successfully!\n";
    print_r($response);

} catch (Exception $e) {
    echo "❌ Error sending SMS: " . $e->getMessage();
}
```

### Get current balance

```php
require 'vendor/autoload.php';

use Smstools\Client;

$client = new Client('your-client-id', 'your-client-secret');

try {
    $response = $client->balance()->get();
    print_r($response);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
```