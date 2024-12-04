<?php

namespace App\Services;

use App\Models\Transfer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\OtpTable;
use Carbon\Carbon;

class TransferService
{

    private function validateOTP($code){
        $otp = OtpTable::where('user_id', Auth::user()->id)->first();
        if(!$otp) return 'not-existing';
        if($otp->code != str_replace('-', '', $code)) return 'code-no-match';
        return Carbon::now()->gt($otp->updated_at->addMinutes(2)) ? 'code-expired' : 'valid';
    }

    public function handle(array $form): \Illuminate\Http\RedirectResponse
    {
        $currentWallet = Auth::user()->wallet;

        if ($form['amount'] > $currentWallet->amount) {
            return redirect()->back()->withErrors(['balance' => 'Transfer amount is greater than your balance']);
        }
        if ($form['receiverCode'] == Auth::user()->referral_code) {
            return redirect()->back()->with('error' , 'Sending funds into your  account is not allowed here');
        }

//        $otpRes = $this->validateOTP($form['verificationCode']);

//        if ($otpRes != 'valid') {
//            return redirect()->back()->with('error', "Verification code invalid or has expired !");
//        }

        try {
            $receiver = User::query()->where('referral_code', "=", $form['receiverCode'])->firstOrFail();

            $currentWallet->update([
                'amount' => $currentWallet->amount - $form['amount']
            ]);

            $receiver->wallet->update([
                'amount' => $receiver->wallet->amount + $form['amount'],
            ]);

            Transfer::create([
                'user_id' => Auth::user()->id,
                'wallet_id' => $currentWallet->id,
                'receiver_email' => $receiver->email,
                'amount'         => $form['amount'],
                'description'   => 'transfer',
                'type'          => 'Approved',
            ]);

            return redirect()->back()->with('success' , "Successful transfer to ". $receiver->name);

        }catch (\Exception $exception)
        {
            return redirect()->back()->with('error' , "We could not find a user with this code");
        }
    }
}
