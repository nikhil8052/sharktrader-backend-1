<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWithdrawRequest;
use App\Http\Requests\UpdateWithdrawRequest;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdraw;
use App\Services\WithdrawService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PragmaRX\Google2FA\Google2FA;

class WithdrawController extends Controller
{
    public function index()
    {
       /* $google2fa = new Google2FA();
        $sec = $google2fa->generateSecretKey();
        $qrCodeUrl = $google2fa->getQRCodeUrl(
            'kamran',
            'kamran@gmail.com',
            $sec
        );
        dd($qrCodeUrl);*/
        return view('wallet.withdraw.index', ['wallet' => Auth::user()->wallet]);
    }

    public function awaiting(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('wallet.withdraw.awaiting', ['awaiting' => Auth::user()->withdraws->where('status', 'Pending')]);
    }

    public function approved(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('wallet.withdraw.aproved', ['approved' => Auth::user()->withdraws->where('status', 'Approved')]);
    }

    public function approvedDetails($id){
        $withdraw = Auth::user()->withdraws->where('id', $id)->first();
        $wallet = Wallet::query()->where('id', $withdraw->wallet_id)->first();
        return view('wallet.withdraw.aproved_single', ['withdraw' => Auth::user()->withdraws->where('id', $id)->first(), 'wallet' => $wallet]);
    }

    public function withdraw(StoreWithdrawRequest $storeWithdrawRequest, WithdrawService $withdrawService)
    {
        return $withdrawService->handle($storeWithdrawRequest->validated());
    }

    public function update(UpdateWithdrawRequest $withdrawRequest)
    {
        try {
            $data = $withdrawRequest->validated();

            $wallet = Wallet::query()->where('id', $data['wallet_id'])->firstOrFail();
            $withdraw = Withdraw::query()->find($data['id']);

            DB::transaction(function () use ($wallet, $withdraw, $data) {
                $wallet->update([
                    'amount' => $wallet->amount - $data['amount'],
                    'updated_at' => now(),
                ]);

                $withdraw->update([
                    'status' => 'Approved',
                    'amount' => -1 * ($withdraw->amount)
                ]);
            });

            return redirect()->back()->with('success', "Successful Withdraw");
        } catch (Exception $exception) {
            Log::error('Failed withdraw' . $exception);
            return redirect()->back()->with('error', "Error with withdraw");
        }
    }
}
