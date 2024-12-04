<?php

namespace App\Services;

use App\Models\Deposit;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use JetBrains\PhpStorm\ArrayShape;

class DepositService
{
    /**
     * @throws Exception
     */
    public function handle($data)
    {
        $user = Auth::user();
        $lifespan = Carbon::now()->addMinutes(20);

        try {
            $deposit = Deposit::create([
                'user_id'         => $user->id,
                'wallet_id'       => $user->wallet->id,
                'amount'          => $data['amount'],
                'description'     => 'test',
                'type'            => $data['withdrawalAddress'],
                'status'          => 'Pending',
                'available_until' => $lifespan,
            ]);

            $deposit->update([
                'callback' => config('blockbee.callback').'?deposit_id='. $deposit->id
            ]);

            return $deposit;

        } catch (Exception $exception) {
            throw new Exception("Couldn't create deposit" . $exception);
        }
    }
}
