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
            'json' => $data,
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
            'json' => $data,
        ]);

        return $response->getStatusCode();
    }

    public function chargeInvoice($invoiceID, $paymentMethodID)
    {
        $response = $this->client->request('POST', 'invoices/' . $invoiceID . '/charge', [
            'auth' => [$this->apiKey, ''],
            'json' => [
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
            'json' => $data,
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
            'json' => $data,
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
}