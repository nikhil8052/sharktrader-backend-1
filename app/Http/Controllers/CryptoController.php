<?php

namespace App\Http\Controllers;

use App\Services\CoinLayerClient;
use App\Services\CoinMarketCapClient;
use App\Services\CoinRankingClient;
use App\Services\CryptoCompareClient;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CryptoController extends Controller
{
    public function getCryptoListOld()
    {
        // Create a new Guzzle HTTP client
        $client = new Client();

        // Replace 'YOUR_API_KEY' with your actual CoinMarketCap API key
//        $apiKey = '16c6208f-9cd0-4d4e-93e4-bb7d49ea08b3';
        $apiKey = config('coinmarketcap.access_key');
        // Define the CoinMarketCap API endpoint
        $apiUrl = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?start=1&limit=10';

        try {
            // Make a GET request to the API
            $response = $client->get($apiUrl, [
                'query' => [
                    'start' => 1, // You can adjust the start value if needed
                    'limit' => 10, // Add the limit parameter
                    'CMC_PRO_API_KEY' => $apiKey,
                ],
            ]);

            // Parse the JSON response
            $data = json_decode($response->getBody(), true);

            // Extract the list of cryptocurrencies and format the data
            $cryptoList = [];
            foreach ($data['data'] as $crypto) {
                $cryptoList[] = [
                    'name' => $crypto['name'],
                    'symbol' => $crypto['symbol'],
                    'quote' => $crypto['quote']
                ];
            }

            // Return the array of cryptocurrency data
            return $cryptoList;
        } catch (\Exception $e) {
            // Handle errors here
            return response()->json(['error' => 'An error occurred while fetching cryptocurrency data.'], 500);
        }
    }
    public function getCryptoList(Request $request): \Illuminate\Http\JsonResponse|array
    {
        try {
            $levels = ExchangeController::$levels;
            $crypto_currencies = ExchangeController::$crypto_currencies;
            if (isset($levels[$request->market])){
                switch($levels[$request->market]){
                    case 'Binance':
                        $data = (new CoinMarketCapClient('latest'))->rates();
                        foreach ($data['data'] as $crypto) {
                            if (in_array($crypto['symbol'], $crypto_currencies)){
                                /*$cryptoList[] = [
                                    'name' => $crypto['name'],
                                    'symbol' => $crypto['symbol'],
                                    'quote' => $crypto['quote']
                                ];*/
                                    foreach ($crypto['quote'] as $quote){
                                        $cryptoList[$crypto['symbol']] = $quote['price'];
                                    }
                            }
                        }
                        break;
                    case 'Kraken':
                        $data = (new CryptoCompareClient('pricemulti', $crypto_currencies,'USDT'))->rates();
                        foreach ($data as $cryptoKey => $crypto){
                            if (in_array($cryptoKey, $crypto_currencies)){
                                $cryptoList[$cryptoKey] = $crypto['USDT'];
                            }
                        }
                        break;
                    case 'Gemini':
                        $data = (new CoinLayerClient('live', $crypto_currencies))->rates();
                        foreach ($data['rates'] as $cryptoKey => $crypto) {
                            if (in_array($cryptoKey, $crypto_currencies)){
                                $cryptoList[$cryptoKey] = $crypto;
                            }
                        }
                        break;
                    case 'Bithumb':
                        $data = (new CoinRankingClient('coins', $crypto_currencies))->rates();
                        if (isset($data['data']['coins'])){
                            foreach ($data['data']['coins'] as $crypto) {
                                if (in_array($crypto['symbol'], $crypto_currencies) && !is_null($crypto['price'])){
//                                    echo $crypto['symbol'] . '=' . $crypto['price'];
//                                    echo '<br>';
                                    $cryptoList[$crypto['symbol']] = $crypto['price'];
                                }
                            }
                        }
                        break;
                    default:
                        $cryptoList = [];
                }

            }


            // Return the array of cryptocurrency data
            return $cryptoList;
        } catch (\Exception $e) {
            // Handle errors here
            return response()->json(['error' => 'An error occurred while fetching cryptocurrency data.'], 500);
        }
    }
}
