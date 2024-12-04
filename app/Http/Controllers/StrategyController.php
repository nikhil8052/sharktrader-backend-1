<?php

namespace App\Http\Controllers;

use App\Models\ListStrategy;
use App\Models\Rewards;
use App\Models\Strategy;
use App\Models\StrategyCryptoEarnins;
use App\Models\User;
use App\Services\StrategyService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StrategyController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $strategies = Auth::user()->strategies->groupBy('status');

        return view('strategy.index', [
            'working' => Strategy::where('user_id', '=', Auth::user()->id)->where('status', '=' , 'active')->orderBy('updated_at', 'desc')->get(),
            'finished' => Strategy::where('user_id', '=', Auth::user()->id)->where('status', '=' ,  'finished')->orderBy('updated_at', 'desc')->get(),
        ]);
    }

    public function show($strategy): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $strategy = Strategy::where('order_id', $strategy)->first();

        if (!$strategy || $strategy->user_id != \auth()->id()){
            abort(404);
        }
        if ($strategy->status == 'active'){
            $investment_amount = $strategy->amount;
            $reward_amount = 0;
            if ($investment_amount >= 20 && $investment_amount <= 100){
                $reward_amount = 0.05;
            }else if ($investment_amount >= 101 && $investment_amount <= 300){
                $reward_amount = 0.12;
            }else if ($investment_amount >= 301 && $investment_amount <= 600){
                $reward_amount = 0.17;
            }else if ($investment_amount >= 601){
                $reward_amount = 0.225;
            }
            $reward = Rewards::where('user_id', auth()->user()->id)->first();

            if (!$reward) {
                $reward = new Rewards([
                    'user_id' => auth()->user()->id,
                    'next_claim' => Carbon::now()->addHours(4),
                    'amount' => $reward_amount
                ]);
                $reward->save();
            }else{
                $reward->amount = $reward_amount;
                $reward->save();
            }

            return view('strategy.show.active', [
                'strategy' => $strategy,
                'reward' => $reward,
                'created' => Carbon::parse($strategy->created_at)->format('Y-m-d H:i:s'),
            ]);
        }
        $cryptos = [
            'btc' => random_int(0, 100),
            'sol' => random_int(0, 100),
            'etc' => random_int(0, 100),
            'link' => random_int(0, 100),
            'eth' => random_int(0, 100),
            'ada' => random_int(0, 100),
        ];

        $totalNo = array_reduce($cryptos, function($carry, $n){
            $carry += $n;
            return $carry;
        });

        $earnings = StrategyCryptoEarnins::where('strategy_id', $strategy->id)->first();

        if(!$earnings){
            $earnings = StrategyCryptoEarnins::create([
                'btc' => ($cryptos['btc'] / $totalNo) * 100,
                'sol' => ($cryptos['sol'] / $totalNo) * 100,
                'etc' => ($cryptos['etc'] / $totalNo) * 100,
                'link' => ($cryptos['link'] / $totalNo) * 100,
                'eth' => ($cryptos['eth'] / $totalNo) * 100,
                'ada' => ($cryptos['ada'] / $totalNo) * 100,
                'strategy_id' => $strategy->id
            ]);
        }

        return view('strategy.show.finished', [
            'strategy' => $strategy,
            'earnings' => [
                $earnings->btc,
                $earnings->sol,
                $earnings->etc,
                $earnings->link,
                $earnings->eth,
                $earnings->ada,
            ],
            'created' => Carbon::parse($strategy->created_at)->format('Y-m-d H:i:s'),
        ]);
    }

}
