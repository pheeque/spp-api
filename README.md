### SPP API PHP Library
Provides a wrapper around the SPP API.


#### Installation

`composer require pheeque/spp-api`

Include composer autoloader and retrieve an api instance

```
require 'vendor/autoload.php';

use Pheeque\SPP\Api;

$sppApi = new Api("https://xxxx.spp.io/", "xxxx");
```

### Invoices
#### Get all invoices
```
$options = ['limit' => 5];
$invoices = $sppApi->getInvoices($options);
```

#### Create an invoice
```
$invoiceData = [
    'email' => 'xxxx@gmail.com',
];
$statusCode = $sppApi->createInvoice($invoiceData);
```

#### Retrieve a single invoice
```
$invoice = $sppApi->getInvoice('1D3850383');
```

#### Update an invoice
```
$invoiceData = [
    'email' => 'xxxx@gmail.com',
];
$statusCode = $sppApi->updateInvoice($invoiceData);
```

#### Charge invoice
```
$sppApi->chargeInvoice('1D3850383', 'pm_xxxx');
```

#### Mark invoice as paid
```
$sppApi->markInvoiceAsPaid('1D3850383');
```

#### Delete an invoice
```
$sppApi->deleteInvoice('1D3850383');
```


### Clients

#### Create a client
```
$sppApi->createClient($clientData);
```

#### Get a client
```
$sppApi->getClient($clientID);
```

#### Update a client
```
$sppApi->updateClient($clientData);
```

#### Delete a client
```
$sppApi->deleteClient($clientID);
```

#### Get all clients
```
$sppApi->getClients($clientID);
```