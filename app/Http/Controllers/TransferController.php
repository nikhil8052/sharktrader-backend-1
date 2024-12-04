<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransferRequest;
use App\Models\User;
use App\Services\TransferService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FALaravel\Support\Authenticator;

class TransferController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        \Google2FA::logout();
        return view('wallet.transfer.index', [
            'wallet' => $user->wallet,
            'phoneNumber' => $user->phone_number,
            ]);
    }

    public function transferUser(StoreTransferRequest $storeTransferRequest, TransferService $transferService): \Illuminate\Http\RedirectResponse
    {
        $data = $storeTransferRequest->validated();
        $storeTransferRequest->merge(['one_time_password' => $data['verificationCode']]);
        $authenticator = app(Authenticator::class)->boot($storeTransferRequest);
        if (!$authenticator->isAuthenticated()){
            throw \Illuminate\Validation\ValidationException::withMessages(['one_time_password' => "The 'One Time Password' typed was wrong."]);
        }
        return $transferService->handle($storeTransferRequest->validated());
    }
}
