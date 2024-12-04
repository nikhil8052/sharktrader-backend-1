<?php

namespace App\Console\Commands;

use App\Models\Deposit;
use Exception;
use Illuminate\Console\Command;

class DeactivateDeposits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deactivate:deposits';

    /*
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate all deposits that have passed the lifespan';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {

            $deposits = Deposit::query()
                ->where('status');

        }catch (Exception $exception) {

        }
    }
}
