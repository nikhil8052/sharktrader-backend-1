<?php

namespace App\Services;

class PolygonClient
{
    public $endpoint;
    protected $access_key;
    protected $start;
    protected $limit;

    public function __construct($endpoint, $start = 1, $limit = 10)
    {
        $this->endpoint = $endpoint;
        $this->start = $start;
        $this->limit = $limit;
        $this->access_key = config('coinmarketcap.access_key');
    }

    public function rates()
    {
        $query = [
            'CMC_PRO_API_KEY' => $this->access_key,
            'start'     => $this->start,
            'limit'     => $this->limit
        ];
//        $ch = curl_init('http://api.coinmarketcap.com/api/' . $this->endpoint . '?' . http_build_query($query));
        $ch = curl_init('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/' . $this->endpoint . '?' . http_build_query($query));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);
        curl_close($ch);

        $exchangeRates = json_decode($json, true);

        return $exchangeRates;
    }
}
