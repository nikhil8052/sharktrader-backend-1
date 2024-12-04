<?php

namespace App\Services;

use App\Models\Shark;
use Carbon\Carbon;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;

class UpdateUserAmountService
{
    public function handle($request)
    {
        $user = Auth::user();
        $wallet = $user->wallet;
        $shark = Shark::find($request['shark_id']);

        if ($wallet->amount <= 0 || $wallet->amount < $shark->cost) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'failed' => "You don't have enough resources to purchase this item"
                ],
            ], 500);
        }

        $updatedAmount = $wallet->amount - $shark->cost;

        $wallet->update([
            'amount' => $updatedAmount,
        ]);


        $user->sharks()->attach($shark, [
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'active_until' => Carbon::now()->addDays($shark->duration),
        ]);

        return response()->json([
            'success' => true,
            'shark' => [
                'name' => $shark->name,
            ],
        ], 200);
    }
}
