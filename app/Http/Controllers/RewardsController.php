<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Wallet;
use App\Models\Rewards;
use Illuminate\Http\Request;

class RewardsController extends Controller
{
    //
    public function claim(Request $request){
        try {
            $reward = HelperController::getReward();
            return response()->json(['success' => true, 'msg' => 'Reward Claimed!', 'reward' => $reward]);
        } catch(Exception $e){
            return response()->json(['success' => false, 'msg' =>  $e->getMessage()]);
        }
    }
}
