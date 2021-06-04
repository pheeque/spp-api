### SPP API PHP Library
Provides a wrapper around the SPP API.


#### Installation

`composer require pheeque/spp-api`

Include composer autoloader and retrieve an api instance by passing in your SPP domain and your secret API key.

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
$statusCode = $sppApi->updateInvoice($invoiceID, $invoiceData);
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
$sppApi->updateClient($clientID, $clientData);
```

#### Delete a client
```
$sppApi->deleteClient($clientID);
```

#### Get all clients
```
$sppApi->getClients();
```

### Orders

#### Create an order
```
$sppApi->createOrder($orderData);
```

#### Get an order
```
$sppApi->getOrder($orderID);
```

#### Update an order
```
$sppApi->updateOrder($orderID, $orderData);
```

#### Delete an order
```
$sppApi->deleteOrder($orderID);
```

#### Get all orders
```
$sppApi->getOrders();
```

#### Create order message
```
$sppApi->createOrderMessage($orderID, $message, $userID, $staff_only);
```

#### Delete order message
```
$sppApi->deleteOrderMessage($orderID, $messageID);
```

#### Get all order messages
```
$sppApi->getOrderMessages($orderID);
```

### Tickets

#### Create a ticket
```
$sppApi->createTicket($ticketData);
```

#### Get a ticket
```
$sppApi->getTicket($ticketID);
```

#### Update a ticket
```
$sppApi->updateTicket($ticketData);
```

#### Delete a ticket
```
$sppApi->deleteTicket($ticketID);
```

#### Get all tickets
```
$sppApi->getTickets();
```


### Login Links
```
$sppApi->loginLink($userID);
```