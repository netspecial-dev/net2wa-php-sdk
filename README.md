# Net2wa PHP SDK

Libreria ufficiale per inviare messaggi WhatsApp tramite API Net2wa.

## Installazione

### Metodo 1 – Composer

```bash
composer require net2wa/net2wa-php-sdk
```

### Metodo 2 – Manuale

Scarica il file `Net2waClient.php` da `src/` ed includilo nel tuo progetto.

## Utilizzo

```php
require_once 'src/Net2waClient.php';

use Net2wa\Net2waClient;

$client = new Net2waClient('INSERISCI_API_KEY');

// Invia messaggio testo
$client->sendText('393331234567', 'Ciao dal tuo software!');

// Invia media
$base64 = base64_encode(file_get_contents('file.pdf'));
$client->sendMedia('393331234567', $base64, 'file.pdf', 'application/pdf', 'Ecco il file!');
```

## Documentazione API

Consulta: [https://net2wa.com](https://net2wa.com)
