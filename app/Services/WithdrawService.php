<?php

namespace App\Services;

use App\Mail\WithdrawRequestMail;
use App\Models\Withdraw;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WithdrawService
{
    public function handle(array $request)
    {
        $user = Auth::user();

        try {
            if ($user->payment_password != $request['payment_password']){
                return redirect()->route('wallet.withdraw.index')->withInput()->with('error', 'Payment password was invalid!');
            }

            $withdraw = Withdraw::create([
                'user_id'          => $user->id,
                'wallet_id'        => $user->wallet->id,
                'amount'           => $request['amount'],
                'status'           => "Pending",
                'withdraw_address' => $request['withdrawalAddress'],
            ]);

            Mail::to('neospide@gmx.com')->send(new WithdrawRequestMail($withdraw, $user));

            return redirect()->route('wallet.withdraw.index')->with('success', 'Withdraw is saved successfully');
        } catch (Exception $exception) {
            \Log::error($exception);
           return redirect()->route('wallet.withdraw.index')->with('error', 'Failed to withdraw funds !');
        }
    }
}
