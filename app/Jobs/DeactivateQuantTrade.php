<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Team;
use App\Models\User;
use App\Models\Strategy;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use App\Models\StrategyCryptoEarnins;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Console\Commands\DeactivateQuantTradeCommand;
use Illuminate\Contracts\Broadcasting\ShouldBeUnique;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use App\Models\Wallet;

class DeactivateQuantTrade implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $strategy;


    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function middleware()
    {
        return [(new WithoutOverlapping($this->strategy->id))];
    }

    public function handle()
    {
        Log::info('Deactivating Quant Trade', ['strategy_id' => $this->strategy->id]);

        $wallet = Wallet::where('user_id', '=', $this->strategy->user_id)->first();

        $oldAmount = $wallet->amount;
        $earnings = ($this->strategy->earnings + $this->strategy->amount);

        $newAmount = $oldAmount + $earnings;

        $wallet->amount = $newAmount;

        $wallet->save();

        $this->strategy->status = 'finished';
        $this->strategy->save();

        $cryptos = [
            'btc' => random_int(0, 100),
            'sol' => random_int(0, 100),
            'etc' => random_int(0, 100),
            'link' => random_int(0, 100),
            'eth' => random_int(0, 100),
            'ada' => random_int(0, 100),
        ];

        $totalNo = array_reduce($cryptos, function ($carry, $n) {
            $carry += $n;
            return $carry;
        });

        StrategyCryptoEarnins::create([
            'btc' => ($cryptos['btc'] / $totalNo) * 100,
            'sol' => ($cryptos['sol'] / $totalNo) * 100,
            'etc' => ($cryptos['etc'] / $totalNo) * 100,
            'link' => ($cryptos['link'] / $totalNo) * 100,
            'eth' => ($cryptos['eth'] / $totalNo) * 100,
            'ada' => ($cryptos['ada'] / $totalNo) * 100,
            'strategy_id' => $this->strategy->id
        ]);

        $this->strategy->user->sharks->each(function ($shark) {
            if ($shark->pivot->id == $this->strategy->shark_id && !$shark->pivot->active) {
                $shark->pivot->update([
                    'active' => true,
                ]);
            }
        });

        $this->applyReferralCommision($this->strategy->user, $this->strategy->earnings);
    }

    private function applyReferralCommision($user, $earnings)
    {
        $team = Team::query()->where('referral_code', $user->referral_code)->first();

        $teamParents = $team ? $team->ancestors()->get() : null;

        if ($teamParents && !$teamParents->isEmpty()) {

            $teamParents->each(function ($team) use ($earnings, $teamParents) {

                if (isset(DeactivateQuantTradeCommand::RECURSIVE_COMMISION[$team->depth])){
                    $com = $team->received_commission + (DeactivateQuantTradeCommand::RECURSIVE_COMMISION[$team->depth] * $earnings);
                    if ($team->depth >= -5) {
                        $team->received_commission = $com;
                        $team->save();
                    }
                }
            });
        }
    }
}
