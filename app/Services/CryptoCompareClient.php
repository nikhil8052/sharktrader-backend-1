<?php

namespace App\Services;

class CryptoCompareClient
{
    public $endpoint;
    protected $access_key;
    protected $start;
    protected $limit;
    protected $fsym;
    protected $tsyms;

    public function __construct($endpoint, $fsym = 'BTC', $tsyms = 'USDT')
    {
        $this->endpoint = $endpoint;
        $this->fsym = $fsym;
        $this->tsyms = $tsyms;
        $this->access_key = config('cryptocompare.access_key');
    }

    public function rates()
    {
        $query = [
            'api_key' => $this->access_key
        ];
        $fsym = (is_array($this->fsym) ? implode(',', $this->fsym) : $this->fsym);
        $tsyms = (is_array($this->tsyms) ? implode(',', $this->tsyms) : $this->tsyms);
        $concat = '&fsyms=' . $fsym . '&tsyms=' . $tsyms;
//        dd('https://min-api.cryptocompare.com/data/' . $this->endpoint . '?' . http_build_query($query).$concat);
        $ch = curl_init('https://min-api.cryptocompare.com/data/' . $this->endpoint . '?' . http_build_query($query).$concat);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);
        curl_close($ch);

        $exchangeRates = json_decode($json, true);

        return $exchangeRates;
    }
}
