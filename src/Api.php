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
}