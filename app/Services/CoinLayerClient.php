<?php

namespace App\Services;

class CoinLayerClient
{
    public $endpoint;
    protected $access_key;
    protected $currencies;

    public function __construct($endpoint, $currencies = false)
    {
        $this->endpoint = $endpoint;
        $this->currencies = $currencies;
        $this->access_key = config('coinlayer.access_key');
    }

    public function rates()
    {
        $query = [
            'access_key' => $this->access_key,
            'target'     => 'USDT'
        ];
        $url = 'http://api.coinlayer.com/api/' . $this->endpoint . '?' . http_build_query($query);
        if ($this->currencies && is_array($this->currencies)){
            $url .= '&symbols='.implode(',', $this->currencies);
        }
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);
        curl_close($ch);

        $exchangeRates = json_decode($json, true);

        return $exchangeRates;
    }
}
