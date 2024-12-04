<?php

namespace App\Http\Controllers;

use App\Models\Rewards;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HelperController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('helper.faq');
    }

    public function company(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('helper.company');
    }

    public function invite(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('helper.invite', ['referral_code' =>  Auth::user()->referral_code]);
    }

    public function mediaRelated(){
        return view('helper.media-related');
    }

    public function userTutorial()
    {
        return view('helper.user-tutorial');
    }

    public function download(Request $request){

        $myFile = public_path('storage/pdf/'.$request->file);

        $headers = ['Content-Type: application/pdf'];
        $newName = $request->file;

        return response()->download($myFile, $newName, $headers);
    }

    /**
     * @return mixed
     */
    public static function getReward($buy = false)
    {
        $reward = Rewards::where('user_id', auth()->user()->id)->first();

        $now = Carbon::now();

//        this condition should not work when request come from when user buy a strategy
        if (!$buy){
            if ($now->lte($reward->next_claim)) throw new \Error('Reward not available! Comeback later!!');
            $wallet = Wallet::where('user_id', auth()->user()->id)->first();
            $wallet->amount += config('app.reward_amount');
            $wallet->save();
        }

        $reward = Rewards::where('user_id', auth()->user()->id)->first();
        $reward->next_claim = Carbon::now()->addHours(4);
        $reward->save();
        $user = auth()->user();
        $strategiesAmount = $user->strategies()
            ->where('status', '=', 'active')
            ->orderBy('updated_at', 'desc')
            ->sum('amount');

        if ($user->deposits()->count() > 0 && ($user->wallet->amount >= 10 || $strategiesAmount >= 10)) {
            if ($reward->is_locked == true) {
                $reward->is_locked = false;
                $reward->next_claim = Carbon::now()->addHours(4);
                $reward->save();
            }
        } else {
            $reward->is_locked = true;
            $reward->next_claim = Carbon::now()->addHours(4);
            $reward->save();
        }
        return $reward;
    }

}
