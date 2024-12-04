<?php

namespace App\Listeners;

use App\Events\SuccessfulDeposit;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreSuccessfulDeposit
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function handle(SuccessfulDeposit $event)
    {
        try {
            $deposit = $event->deposit;
            $data = $event->data;
            $wallet = $event->deposit->wallet;

            Log::info('Processing Deposit ', (array)$deposit);

            DB::transaction(function () use ($wallet, $deposit, $data) {
                $wallet->update([
                    'amount' => $wallet->amount + $data['value_coin']
                ]);


                $deposit->update([
                    'amount' => $data['value_coin'],
                    'status' => 'Approved',
                ]);

                Log::info('Successful deposit ', [$wallet, $deposit]);
            });
        } catch (Exception $exception) {
            throw new Exception('Failed to update wallet or deposit', $exception);
        }
    }
}
