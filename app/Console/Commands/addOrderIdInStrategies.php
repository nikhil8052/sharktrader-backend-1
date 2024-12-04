<?php

namespace App\Console\Commands;

use App\Models\Strategy;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class addOrderIdInStrategies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'strategies:add-order-id';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Strategy::query()
            ->whereNull('order_id')
            ->orWhere('order_id', '')
            ->chunk(50, function ($strategies) {
                foreach ($strategies as $strategy) {
                    if ($strategy->order_id == '' || is_null($strategy->order_id)) {
                        $order_id = 'SW' . rand(10213568, 99999999);
                        if (Strategy::where('order_id', $order_id)->count() > 0){
                            $order_id = 'SW' . rand(10213568, 99999999);
                        }
                        if (Strategy::where('order_id', $order_id)->count() > 0){
                            $order_id = 'SW' . rand(10213568, 99999999);
                        }
                        if (Strategy::where('order_id', $order_id)->count() > 0){
                            $order_id = 'SW' . rand(10213568, 99999999);
                        }
                        $strategy->order_id = $order_id;
                        $strategy->save();
                    }
                }
            });
    }
}
