<?php

namespace App\Services;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ClientAPI
{
    public mixed $response;
    public mixed $error;
    protected string $apiKey;
    protected $data;
    public $qrCode;
    public $paymentURI;
    public $deposit;

    public function __construct($request, $deposit)
    {
        $this->data = $request;
        $this->apiKey = config('blockbee.api_key');
        $this->deposit = $deposit;
    }

    public function createAddress()
    {
        $ticker = $this->data['withdrawalAddress'];
        $query = [
            "apikey"        => $this->apiKey,
            "callback"      => config('blockbee.callback').'?deposit_id='.$this->deposit->id,
            "address"       => config('blockbee.'.$this->data['withdrawalAddress']),
            "pending"       => 0,
            "confirmations" => 1,
            "post"          => 0,
            "priority"      => "xxxx-economic",
            "multi_token"   => 0,
            "multi_chain"   => 0,
            "convert"       => 0
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.blockbee.io/" . $ticker . "/create/?" . http_build_query($query),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);

        $response = json_decode($response);
        $error = curl_error($curl);

        curl_close($curl);
        Log::info('info', [$response]);

        $this->response = $response;

        return $this;
    }

    public function getDepositQR()
    {
        $ticker = $this->data['withdrawalAddress'];
        $query = [
            "apikey"  => $this->apiKey,
            "address" => @$this->response->address_in,
            "value"   => $this->data['amount'],
            "size"    => "300"
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.blockbee.io/" . $ticker . "/qrcode/?" . http_build_query($query),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = json_decode(curl_exec($curl));
        Log::info('info', [$response]);

        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            $this->error = $error;
        } else {
            $this->qrCode = @$response->qr_code;
            $this->paymentURI = @$response->payment_uri;
        }
        return $this;
    }
}
