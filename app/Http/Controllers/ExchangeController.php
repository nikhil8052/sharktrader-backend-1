<?php

namespace App\Http\Controllers;

use App\Services\CoinLayerClient;
use App\Services\CryptoCompareClient;
use Exception;
use HttpRequest;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExchangeController extends Controller
{
    public static $levels = [
        1 => 'Binance',
        2 => 'Kraken',
        3 => 'Gemini',
        4 => 'Bithumb',
    ];
    public static $crypto_currencies = [
        'BTC',
        'ETH',
        'USDT',
        'XRP',
        'SOL',
        'ADA',
        'DOT',
        'LINK',
        'AVAX',
        'ETC',
    ];
    public static $crypto_currencies_analysis = [
        'BTC',
        'USDT',
        'BUSD',
        'USDC',
        'BNB',
        'XRP',
        'DOGE',
        'ETH',
        'LUNC',
        'TON',
        'SOL',
        'ADA',
        'TRX',
        'DAI',
        'MATIC',
        'DOT',
        'LTC',
        'SHIB',
        'LINK',
        'AVAX',
        'ETC',
        'IMX',
        'NFT',
    ];
    public function index()
    {
        $levels = self::$levels;
        $crypto_currencies = self::$crypto_currencies;
        return view('exchange.index', compact('levels', 'crypto_currencies'));
    }

    public function rates(Request $request)
    {
//        return (new CoinLayerClient('live'))->rates();
        $data = (new CryptoCompareClient('pricemulti', self::$crypto_currencies_analysis,'USDT'))->rates();
        $cryptoList = [];
        $cryptoList['rates'] = [];
        $cryptoList['success'] = true;
        $cryptoList['target'] = 'USDT';
        foreach ($data as $cryptoKey => $crypto){
            $cryptoList['rates'][$cryptoKey] = $crypto['USDT'];
        }
        return $cryptoList;
    }
}
