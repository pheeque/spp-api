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