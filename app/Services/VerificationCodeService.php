<?php

namespace App\Services;

use App\Models\PhoneNumbers;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class VerificationCodeService
{
    public function handle($verification_code)
    {
        $user = Auth::user()->id;
        $duration = Carbon::now()->subMinutes(20);

        $pn = PhoneNumbers::query()->where('verification_code', $verification_code)->first();

        if (!$pn) {
            return false;
        }

        $pnCreatedAt = Carbon::parse($pn->created_at);

        if ($pnCreatedAt->lt($duration)) {
            return false;
        }

        return true;
    }
}
