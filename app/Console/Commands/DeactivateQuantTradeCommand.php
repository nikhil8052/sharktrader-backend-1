<?php

namespace App\Console\Commands;

use App\Jobs\DeactivateQuantTrade;
use App\Models\Strategy;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeactivateQuantTradeCommand extends Command
{
    const RECURSIVE_COMMISION = [
        -1 => (10 / 100),
        -2 => (6 / 100),
        -3 => (4 / 100),
        -4 => (4 / 100),
        -5 => (4 / 100),
    ];

    protected $signature = 'deactivate:quantTrade';

    protected $description = 'Deactivated quant trades based on cycles';

    public function handle()
    {
        Log::info('Running Command Deactivate Quant Trade');

        $strategies = Strategy::select('id', 'active_until', 'status')
            ->where('active_until', '<=', Carbon::now())
            ->where('status','=', 'active')
            ->get();

        foreach ($strategies as $strategy) {
            dispatch(new DeactivateQuantTrade($strategy));
        }
    }
}
