<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeactivateSharkCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deactivate:shark';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It will deactive sharks if the duration has ended';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        Log::info('Running Command Deactivate Shark');

        try {
            $users = User::with('sharks')->get();

            $users->each(function ($user) {
                $user->sharks->filter(function ($shark) {
                    $now = Carbon::now();
                    $sharkAvailable = Carbon::parse($shark->pivot->active_until);

                    if ($now->gte($sharkAvailable) && $shark->pivot->active) {
                        $shark->pivot->delete();

                        Log::info('Deactivated & Deleted Shark' . $shark->pivot);
                    }
                });
            });
        } catch (Exception $exception) {
            Log::error('Error deactivating shark ' . $exception);
        }
    }
}
