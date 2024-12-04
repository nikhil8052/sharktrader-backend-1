<?php

namespace App\Console\Commands;

use App\Models\Rewards;
use App\Models\Shark;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserRewardSystem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:ai-reward';

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
        $consecutiveDays = $this->getLast7DaysDates();
        if (count($consecutiveDays) > 6) {
            $users = User::whereHas('deposits', function ($query) {
                $query->where('status', 'Approved')->where('amount', '>', 10);
            })->whereHas('checkins', function ($query) use ($consecutiveDays) {
                $query->whereIn(DB::raw('DATE(created_at)'), $consecutiveDays);
            })->get();
            foreach ($users as $user) {
//            Check for 1st Reward (30 day subscription for free)
                $checkins = $user->checkins()->whereIn(DB::raw('DATE(created_at)'), $consecutiveDays)->orderBy('created_at')->get();
                if ($checkins->count() > 6) {
                    $checkinDates = [];
                    foreach ($checkins as $checkin) {
                        $checkinDates[] = Carbon::createFromDate($checkin->created_at)->format('Y-m-d');
                    }
                    $firstDayOfMonth = Carbon::now()->startOfMonth();
                    $lastDayOfMonth = Carbon::now()->endOfMonth();
                    if ($this->areDatesConsecutive($checkinDates)) {
                        //Give User Reward (30 day subscription for free)
                        if ($user->rewards()->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->where('reward_type', '7_day_reward')){
                            $shark = Shark::where('duration', 30)->first();
                            if ($shark) {
                                $user->sharks()->attach($shark, [
                                    'active' => true,
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                    'active_until' => Carbon::now()->addDays($shark->duration),
                                ]);
                                $reward = new Rewards();
                                $reward->user_id = $user->id;
                                $reward->amount = $shark->cost;
                                $reward->reward_type = '7_day_reward';
                                $reward->created_at = now();
                                $reward->updated_at = now();
                                $reward->save();
                                $this->info('7 days consecutive checkins reward (Shark attached for '.$shark->duration. ' ) given to ' . $user->name . '('.$user->user_id.')');
                                Log::info('7 days consecutive checkins reward (Shark attached for '.$shark->duration. ' ) given to ' . $user->name . '('.$user->user_id.')');
                            }
                        }
                    }

                    //            Check for 2nd Reward (90 day subscription for free)
                    $checkins = $user->checkins()->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->orderBy('created_at')->get();
                        if ($checkins->count() >= 15) {
                            //Give User Reward (90 day subscription for free)
                            if ($user->rewards()->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->where('reward_type', '15_day_reward')->count() == 0){
                                $shark = Shark::where('duration', 90)->first();
                                if ($shark) {
                                    $user->sharks()->attach($shark, [
                                        'active' => true,
                                        'created_at' => now(),
                                        'updated_at' => now(),
                                        'active_until' => Carbon::now()->addDays($shark->duration),
                                    ]);
                                    $reward = new Rewards();
                                    $reward->user_id = $user->id;
                                    $reward->amount = $shark->cost;
                                    $reward->reward_type = '15_day_reward';
                                    $reward->created_at = now();
                                    $reward->updated_at = now();
                                    $reward->save();
                                    $this->info('15 days checkins reward (Shark attached for '.$shark->duration. ' ) given to ' . $user->name . '('.$user->user_id.')');
                                    Log::info('15 days checkins reward (Shark attached for '.$shark->duration. ' ) given to ' . $user->name . '('.$user->user_id.')');
                                }
                            }
                        }
                    if ($checkins->count() >= 30) {
                        //Give User Reward ($20 for free)
                        if ($user->rewards()->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])->where('reward_type', '30_day_reward')){
                            $wallet = Wallet::where('user_id', $user->id)->first();
                            $wallet->amount += 20;
                            $wallet->save();
                            $reward = new Rewards();
                            $reward->user_id = $user->id;
                            $reward->amount = 20;
                            $reward->reward_type = '30_day_reward';
                            $reward->created_at = now();
                            $reward->updated_at = now();
                            $reward->save();
                            $this->info('30 days checkins reward ($20 Amount deposit to user account) given to ' . $user->name . '('.$user->user_id.')');
                            Log::info('30 days checkins reward ($20 Amount deposit to user account) given to ' . $user->name . '('.$user->user_id.')');
                        }
                    }
                }
            }
        }
        return Command::SUCCESS;
    }

    protected function areDatesConsecutive(array $dates): bool
    {
        // Sort the dates in ascending order
        sort($dates);

        $count = count($dates);

        // Check if each date is followed by the next one
        for ($i = 0; $i < $count - 1; $i++) {
            $currentDate = new \DateTime($dates[$i]);
            $nextDate = new \DateTime($dates[$i + 1]);

            // Check if the next date is exactly one day after the current date
            if ($currentDate->modify('+1 day') != $nextDate) {
                return false;
            }
        }

        return true;
    }

    protected function getEloquentSqlWithBindings($query): string
    {
        return vsprintf(str_replace('?', '%s', $query->toSql()), collect($query->getBindings())->map(function ($binding) {
            return is_numeric($binding) ? $binding : "'{$binding}'";
        })->toArray());
    }

    protected function getLast7DaysDates()
    {
        $lastDayOfMonth = Carbon::now()->endOfMonth();

        // Create an array to store the last seven dates
        $lastSevenDates = [];

        // Iterate for the last seven days and add them to the array
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);

            // Check if the date is within the current month
            if ($date->month == Carbon::now()->month) {
                $lastSevenDates[] = $date->toDateString();
            }
        }

        return $lastSevenDates;
    }
}
