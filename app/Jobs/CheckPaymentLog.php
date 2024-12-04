<?php

namespace App\Jobs;

use App\Models\Deposit;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckPaymentLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    const SENT = 'sent';
    const APPROVED = 'Approved';

    protected  $data;
    protected Deposit $deposit;
    protected  $response;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data, Deposit $deposit)
    {
        $this->data = $data;
        $this->deposit = $deposit;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            $this->checkPaymentLog($this->data, $this->deposit);


            if ($this->deposit->status == self::APPROVED){
                return;
            }
            Log::info('Callback' . $this->response['callbacks']);

            if (count($this->response['callbacks']) == 0) {
                $this->release(60);
            }

            foreach ($this->response['callbacks'] as $callback) {
                if ($callback['result'] != self::SENT) {
                    continue;
                }

                $wallet = $this->deposit->wallet;

                DB::transaction(function () use ($wallet){
                    $wallet->update([
                        'amount' => $wallet->amount + $this->data['amount']
                    ]);

                    $this->deposit->update([
                        'status' => 'Approved',
                    ]);
                });

                Log::info('Successful deposit '. $wallet . '\\n' . $this->deposit);

                return;
            }
        } catch (Exception $exception) {
            Log::error('Failed Deposit'. $this->deposit . '\\n' . $exception->getMessage(). $exception->getLine());
        }
    }

    public function checkPaymentLog($data, $deposit)
    {
        $ticker = $data['withdrawalAddress'];
        $query = array(
            "apikey" => config('blockbee.api_key'),
            "callback" => config('blockbee.callback') . 113,
        );

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.blockbee.io/" . $ticker . "/logs/?" . http_build_query($query),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        $this->response = json_decode($response, true);
        Log::info('test'.$this->response);
//        $this->response = json_decode('{"status": "success", "callback_url": "http://127.0.0.1:8000/api/v1/deposit/invoice?payment=19", "address_in": "TCTtFCXcBMX7f9Z8bacoC5L9n86gguTxb1", "address_out": "TMp8nEjkn1nQypV5umG9i8VEsYdE9WFDWR", "notify_pending": false, "notify_confirmations": 1, "priority": "default", "callbacks": [{"uuid": "f44909fd-9469-4fef-bf2a-c19477bf479f", "last_update": "21/01/2023 18:27:44", "result": "sent", "confirmations": 32, "fee_percent": "1.00", "fee": 11, "fee_coin": "0.111894", "value": 1200, "value_coin": "12", "value_forwarded": 1107, "value_forwarded_coin": "11.077587", "price": "1.002", "txid_in": "40c1ad8506bb00b49def1cd5d490e1d43708e74b5dfff8e6e63acf859bbce1e8", "txid_out": "4e31ce2decf2ae30c56e027fade3130d788ef5249ae2945bb4cd1b7d0524bff4", "coin": "trc20_usdt", "logs": [{"request_url": "http://127.0.0.1:8000/api/v1/deposit/invoice?payment=19", "response": "Connection error", "response_status": "-3", "timestamp": "21/01/2023 18:27:44", "next_try": "21/01/2023 18:57:44", "pending": false, "success": false}]}]}  ', true);
    }

    public function retryUntil(): \Illuminate\Support\Carbon
    {
        return now()->addMinutes(2);
    }
}
