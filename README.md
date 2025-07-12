# IT) Crea un account su www.net2wa.com ed ottieni la tua API KEY
# EN) Create an account on www.net2wa.com and obtain your API KEY

# Net2wa PHP SDK

###IT) Libreria per inviare messaggi transazionali WhatsApp tramite API Net2wa.
###EN) Library for sending transactional WhatsApp messages via the Net2wa API.

## Installazione / Installation

### Metodo / Method 1 – Composer

```bash
composer require net2wa/net2wa-php-sdk
```

### Metodo / Method 2 – Manuale / Manually

IT) Scarica il file `Net2waClient.php` da `src/` ed includilo nel tuo progetto.
EN) Download the Net2waClient.php file from the src/ folder and include it in your project.

## Utilizzo / Usage

```php
require_once 'src/Net2waClient.php';

use Net2wa\Net2waClient;

$client = new Net2waClient('API_KEY');

// Invia messaggio testo / Send text message
$client->sendText('393331234567', 'Hello World!');

// Invia media / Send media
$base64 = base64_encode(file_get_contents('file.pdf'));
$client->sendMedia('393331234567', $base64, 'file.pdf', 'application/pdf', 'Take your file!');
```

## Documentazione API / API Documentation

[https://net2wa.com](https://net2wa.com)
