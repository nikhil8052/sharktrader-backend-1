<?php

namespace App\Services;

class CoinRankingClient
{
    public $endpoint;
    protected $access_key;
    protected $start;
    protected $limit;
    protected $currencies;

    public function __construct($endpoint, $currencies)
    {
        $this->endpoint = $endpoint;
        if (($key = array_search("BTC", $currencies)) !== false) {
            unset($currencies[$key]);
        }
        $this->currencies = $currencies;
        $this->access_key = config('coinranking.access_key');
    }

    public function rates()
    {
        $curl = curl_init();
        $endpoint = 'https://api.coinranking.com/v2/'.$this->endpoint.'?symbols[]=BTC';
        foreach ($this->currencies as $currency){
            $endpoint .= '&symbols[]='.$currency;
        }
        curl_setopt_array($curl, array(
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-access-token: " . $this->access_key
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $exchangeRates = json_decode($response, true);

        return $exchangeRates;
    }
}
