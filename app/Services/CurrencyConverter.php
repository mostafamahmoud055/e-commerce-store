<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CurrencyConverter
{
    // set API Endpoint, access key, required parameters
    protected $apiKey;
    protected $baseUrl = 'https://free.currconv.com/api/v7';

    public function __construct(string $api_key)
    {
        $this->apiKey = $api_key;
    }

    public function convert(string $from, string $to, float $amount = 1)
    {
        $q = "{$from}_{$to}";
        $response = Http::baseUrl($this->baseUrl)
        ->get('/convert', [
        'q' => $q,
        'compact' => 'y',
        'apiKey' => $this->apiKey,
        ]);
        $result = $response->json();
        return $result[$q]['val'] * $amount;
    }
}
