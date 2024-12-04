<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Models\Wallet;
use App\Rules\BEP20WalletAddressValidationRule;
use App\Rules\TRC20WalletAddressValidationRule;
use App\Services\VerificationCodeService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PragmaRX\Google2FALaravel\Support\Authenticator;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $user =  Auth::user();
        \Google2FA::logout();
        return view('wallet.my-wallet',[
            'wallet'      => $user->wallet,
            'phoneNumber' => $user->phone_number,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWalletRequest  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateWalletRequest $request, Wallet $wallet): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        /*$request->validate([
            'address' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->type === 'trc20/usdt') {
                        $rule = new TRC20WalletAddressValidationRule();
                    } elseif ($request->type === 'bep20/usdt') {
                        $rule = new BEP20WalletAddressValidationRule();
                    } else {
                        $fail('Invalid wallet type.');
                        return;
                    }
                    if (!$rule->passes($attribute, $value)) {
                        $fail($rule->message());
                    }
                },
            ],
        ]);*/
        $request->merge(['one_time_password' => $data['verificationCode']]);
        $authenticator = app(Authenticator::class)->boot($request);
        if (!$authenticator->isAuthenticated()){
            throw \Illuminate\Validation\ValidationException::withMessages(['one_time_password' => "The 'One Time Password' typed was wrong."]);
        }
        try {
            // $verified =  (new VerificationCodeService())->handle($data['verificationCode']);

            // if (!$verified){
            //     return redirect()->back()->with('error', 'Verification code invalid or has expired !');
            // }

            $wallet->update([
                'type' => $data['type'],
                'address' => $data['address'],
            ]);

            return redirect()->back()->with('success', 'Successfuly stored your wallet');

        }catch (Exception $exception){
            Log::error("Cannot add wallet".$exception);

            return redirect()->back()->with('error', 'Error adding your wallet');
        }
    }
}
