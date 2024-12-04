<?php

namespace App\Console\Commands;

use App\Models\Deposit;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentLogCommand extends Command
{
    const SENT = 'sent';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check status of deposit and sent funds back into user wallet';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        Log::info('Running command payment log');

        $pendingDeposits = Deposit::query()
            ->where('status', 'Pending')
            ->get();

        if ($pendingDeposits->isEmpty()){
            Log::info('There are no deposits to process !');
            return;
        };

        $pendingDeposits->each(function ($deposit) {
           $callbacks = $this->checkPaymentLog($deposit);
           $this->processDeposit($callbacks, $deposit);
        });
    }

    public function checkPaymentLog($deposit)
    {
        $ticker = $deposit['type'];

        $response = Http::get("https://api.blockbee.io/" . $ticker . "/logs/?", [
            'apikey'   => config('blockbee.api_key'),
            'callback' => $deposit->callback,
        ]);

        if (!$response->successful()) {

            Log::error('Error checking the log' . $response->body());
            return [];
        }

        $resBody = json_decode($response->body(), true);

        return $resBody['callbacks'];
    }

    private function processDeposit(array $callbacks, Deposit $deposit)
    {
        Log::info('Processing Deposit ',[$deposit ,$callbacks]);

        if (count($callbacks) == 0) {
            Log::info('There are no callbacks for this deposit');
            return;
        }

        foreach ($callbacks as $callback) {
            if ($callback['result'] != self::SENT) {
                continue;
            }

            $wallet = $deposit->wallet;

            DB::transaction(function () use ($wallet, $deposit) {
                $wallet->update([
                    'amount' => $wallet->amount + $deposit->amount
                ]);

                $deposit->update([
                    'status' => 'Approved',
                ]);

                Log::info('Successful deposit ' , [$wallet, $deposit]);
            });

            return;
        }
    }

}
