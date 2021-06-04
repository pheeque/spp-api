<?php

namespace Pheeque\SPP;

use GuzzleHttp\Client;

class Api {

    private $client;

    private $apiKey;

    public function __construct($sppDomain, $apiKey)
    {
        $this->apiKey = $apiKey;

        $this->client = new Client([
            'base_uri' => $sppDomain . '/api/v1/',
        ]);
    }

    public function getInvoices(array $options = []) : array
    {
        $response = $this->client->request('GET', 'invoices', [
            'query' => $options,
            'auth' => [$this->apiKey, ''],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data;      
    }

    public function createInvoice(array $data)
    {
        $response = $this->client->request('POST', 'invoices', [
            'auth' => [$this->apiKey, ''],
            'form_params' => $data,
        ]);

        return $response->getStatusCode();
    }

    public function getInvoice($invoiceID)
    {
        $response = $this->client->request('GET', 'invoices/' . $invoiceID, [
            'auth' => [$this->apiKey, ''],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data;      
    }

    public function updateInvoice($invoiceID, array $data)
    {
        $response = $this->client->request('POST', 'invoices/' . $invoiceID, [
            'auth' => [$this->apiKey, ''],
            'form_params' => $data,
        ]);

        return $response->getStatusCode();
    }

    public function chargeInvoice($invoiceID, $paymentMethodID = null)
    {
        $response = $this->client->request('POST', 'invoices/' . $invoiceID . '/charge', [
            'auth' => [$this->apiKey, ''],
            'form_params' => [
                'payment_method_id' => $paymentMethodID,
            ],
        ]);

        return $response->getStatusCode();
    }

    public function markInvoiceAsPaid($invoiceID)
    {
        $response = $this->client->request('POST', 'invoices/' . $invoiceID . '/mark_paid', [
            'auth' => [$this->apiKey, ''],
        ]);

        return $response->getStatusCode();
    }

    public function deleteInvoice($invoiceID)
    {
        $response = $this->client->request('DELETE', 'invoices/' . $invoiceID, [
            'auth' => [$this->apiKey, ''],
        ]);

        return $response->getStatusCode();
    }

    public function createClient(array $data)
    {
        $response = $this->client->request('POST', 'clients', [
            'auth' => [$this->apiKey, ''],
            'form_params' => $data,
        ]);

        return $response->getStatusCode();
    }

    public function getClient($clientID)
    {
        $response = $this->client->request('GET', 'clients/' . $clientID, [
            'auth' => [$this->apiKey, ''],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data;      
    }

    public function updateClient($clientID, array $data)
    {
        $response = $this->client->request('POST', 'clients/' . $clientID, [
            'auth' => [$this->apiKey, ''],
            'form_params' => $data,
        ]);

        return $response->getStatusCode();
    }

    public function deleteClient($clientID)
    {
        $response = $this->client->request('DELETE', 'clients/' . $clientID, [
            'auth' => [$this->apiKey, ''],
        ]);

        return $response->getStatusCode();
    }

    public function getClients(array $options = []) : array
    {
        $response = $this->client->request('GET', 'clients', [
            'query' => $options,
            'auth' => [$this->apiKey, ''],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data;      
    }

    public function createOrder(array $data)
    {
        $response = $this->client->request('POST', 'orders', [
            'auth' => [$this->apiKey, ''],
            'form_params' => $data,
        ]);

        return $response->getStatusCode();
    }

    public function getOrder($orderID)
    {
        $response = $this->client->request('GET', 'orders/' . $orderID, [
            'auth' => [$this->apiKey, ''],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data;      
    }

    public function updateOrder($orderID, array $data)
    {
        $response = $this->client->request('POST', 'orders/' . $orderID, [
            'auth' => [$this->apiKey, ''],
            'form_params' => $data,
        ]);

        return $response->getStatusCode();
    }

    public function deleteOrder($orderID)
    {
        $response = $this->client->request('DELETE', 'orders/' . $orderID, [
            'auth' => [$this->apiKey, ''],
        ]);

        return $response->getStatusCode();
    }

    public function getOrders(array $options = []) : array
    {
        $response = $this->client->request('GET', 'orders', [
            'query' => $options,
            'auth' => [$this->apiKey, ''],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data;      
    }

    public function createOrderMessage($orderID, $message, $user_id, $staff_only = 0)
    {
        $response = $this->client->request('POST', 'order_messages/' . $orderID, [
            'auth' => [$this->apiKey, ''],
            'form_params' => [
                'order' => $orderID,
                'message' => $message,
                'user_id' => $user_id,
                'staff_only' => $staff_only,
            ],
        ]);

        return $response->getStatusCode();
    }

    public function deleteOrderMessage($orderID, $messageID)
    {
        $response = $this->client->request('DELETE', 'order_messages/' . $orderID . '/' . $messageID, [
            'auth' => [$this->apiKey, ''],
        ]);

        return $response->getStatusCode();
    }

    public function getOrderMessages($orderID) : array
    {
        $response = $this->client->request('GET', 'order_messages/' . $orderID, [
            'auth' => [$this->apiKey, ''],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data;      
    }

    public function createTicket($subject, $note, $user_id, $status = 1)
    {
        $response = $this->client->request('POST', 'tickets', [
            'auth' => [$this->apiKey, ''],
            'form_params' => [
                'user_id' => $user_id,
                'status' => $status,
                'subject' => $subject,
                'note' => $note,
            ],
        ]);

        return $response->getStatusCode();
    }

    public function getTicket($ticketID)
    {
        $response = $this->client->request('GET', 'tickets/' . $ticketID, [
            'auth' => [$this->apiKey, ''],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data;      
    }

    public function updateTicket($ticketID, $subject = null, $note = null, $status = null, $employees = null, $tags = null)
    {
        $formParams = [];

        if ($subject) {
            $formParams['subject'] = $subject;
        }

        if ($note) {
            $formParams['note'] = $note;
        }

        if ($status) {
            $formParams['status'] = $status;
        }

        if ($employees) {
            $formParams['employees'] = $employees;
        }

        if ($tags) {
            $formParams['tags'] = $tags;
        }

        $response = $this->client->request('POST', 'tickets/' . $ticketID, [
            'auth' => [$this->apiKey, ''],
            'form_params' => $formParams,
        ]);

        return $response->getStatusCode();
    }

    public function deleteTicket($ticketID)
    {
        $response = $this->client->request('DELETE', 'tickets/' . $ticketID, [
            'auth' => [$this->apiKey, ''],
        ]);

        return $response->getStatusCode();
    }

    public function getTickets(array $options = []) : array
    {
        $response = $this->client->request('GET', 'tickets', [
            'query' => $options,
            'auth' => [$this->apiKey, ''],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data;      
    }

    public function createTicketMessage($ticketID, $message, $user_id, $staff_only = 0)
    {
        $response = $this->client->request('POST', 'ticket_messages/' . $ticketID , [
            'auth' => [$this->apiKey, ''],
            'form_params' => [
                'user_id' => $user_id,
                'staff_only' => $staff_only,
                'message' => $message,
            ],
        ]);

        return $response->getStatusCode();
    }

    public function deleteTicketMessage($ticketID, $messageID)
    {
        $response = $this->client->request('DELETE', 'ticket_messages/' . $ticketID . '/' . $messageID, [
            'auth' => [$this->apiKey, ''],
        ]);

        return $response->getStatusCode();
    }

    public function getTicketMessages($ticketID) : array
    {
        $response = $this->client->request('GET', 'ticket_messages/' . $ticketID, [
            'auth' => [$this->apiKey, ''],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data;      
    }

    public function loginLink($clientID) : string
    {
        $response = $this->client->request('GET', 'login_links/' . $clientID, [
            'auth' => [$this->apiKey, ''],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data['link'];      
    }
}