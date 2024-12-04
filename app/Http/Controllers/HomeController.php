<?php

namespace App\Http\Controllers;

use App\Models\Rewards;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reward = Rewards::where('user_id', auth()->user()->id)->first();

        if (!$reward) {
            $reward = new Rewards([
                'user_id' => auth()->user()->id,
                'next_claim' => Carbon::now()->addHours(4),
                'amount' => config('app.reward_amount')
            ]);
            $reward->save();
        }
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
        $checkins_data = $user->checkins;
        $checkins = [];
        /*foreach ($checkins_data as $checkin) {
//            echo $checkin->created_at->format('Y-m-d');
//            echo '<br>';
            $checkins[] = [
                'highlight' => [
                    'color' => 'red',
                    'fillMode' => 'light',
                ],
//            'dot' => 'red',
//                'bar' => 'red',
                'popover' => [
                    'visibility' => 'click',
                    'label' => 'Signed in at : ' . $checkin->created_at->format('d M Y') . ' at ' . $checkin->created_at->format('H:i:s A'),
                ],
                'dates' => $checkin->created_at->format('Y-m-d'),
            ];
        }*/
        $allCheckins = DB::table('checkins')
            ->select('id', 'user_id', 'created_at')
            ->where('user_id', auth()->id())
            ->orderBy('created_at')
            ->get();

        $consecutiveDaysArrays = $this->groupByConsecutiveDays($allCheckins);

        foreach ($consecutiveDaysArrays as $i => $consecutiveDaysArray) {
            if (count($consecutiveDaysArray) > 0 && isset($consecutiveDaysArray[0]['date']) && $consecutiveDaysArray[0]['date'] instanceof \DateTime) {
                $startDate = $consecutiveDaysArray[0]['date'];
                $checkin = $consecutiveDaysArray[0]['checkin']->created_at;
//                dd($checkin);
//                $obj = new \stdClass();
//                $obj->start = Carbon::createFromDate($startDate)->format('Y-m-d');
//                $obj->span = count($consecutiveDaysArray);
                foreach ($consecutiveDaysArray as $value) {
                    $checkins[] = [
                        'dot' => 'green',
                        'popover' => [
                            'visibility' => 'click',
                            'label' => 'Signed in at :' . Carbon::createFromDate($value['checkin']->created_at)->format('H:i:s A'),
                        ],
                        'dates' => Carbon::createFromDate($value['date'])->format('Y-m-d'),
                    ];
                }
                /*$checkins[] = [
                    'highlight' => 'green',
                    'popover' => [
                        'visibility' => 'click',
                        'label' => 'Signed in date.',
                    ],
                    'dates' => $obj,
                ];*/
                /*$checkins[] = [
                    'highlight' => [
                        'start' => ['fillMode' => 'outline'],
                        'base' => ['fillMode' => 'light'],
                        'end' => ['fillMode' => 'outline']
                    ],
                    'popover' => [
                        'visibility' => 'click',
                        'label' => 'Signed in date.',
                    ],
                    'dates' => $obj,
                ];*/
                /*$checkins[] = [
                    'dot' => 'green',
                    'popover' => [
                        'visibility' => 'click',
                        'label' => 'Signed in date.',
                    ],
                    'dates' => $obj,
                ];*/
            }
        }

//        dd($checkins);
//        dd($reward->next_claim->format('d M Y, h:s:i A'));
        return view('home', [
            'reward' => $reward,
            'checkins' => $checkins
        ]);
    }

    private function groupByConsecutiveDaysBk($checkins)
    {
        $dates = [];
        foreach ($checkins as $checkin) {
            $date = Carbon::createFromDate($checkin->created_at)->format('Y-m-d');
            $dates[] = [
                'date' => new \DateTime($date),
                'checkin' => $checkin
            ];
        }

        $lastDate = null;
        $ranges = array();
        $currentRange = array();

        foreach ($dates as $dateArray) {
            $date = $dateArray['date'];
            $checkin = $dateArray['checkin'];
            if (null === $lastDate) {
                $currentRange[] = $date;
            } else {

                // get the DateInterval object
                $interval = $date->diff($lastDate);

                // DateInterval has properties for
                // days, weeks. months etc. You should
                // implement some more robust conditions here to
                // make sure all you're not getting false matches
                // for diffs like a month and a day, a year and
                // a day and so on...

                if ($interval->days === 1) {
                    // add this date to the current range
                    $currentRange[] = $date;
                } else {
                    // store the old range and start anew
                    $ranges[] = $currentRange;
                    $currentRange = array($date);
                }
            }

            // end of iteration...
            // this date is now the last date
            $lastDate = $date;
        }

// messy...
        $ranges[] = $currentRange;
        return $ranges;
// print dates
        /*foreach ($ranges as $range) {

            // there'll always be one array element, so
            // shift that off and create a string from the date object
            $startDate = array_shift($range);
            $str = sprintf('%s', $startDate->format('D j M'));

            // if there are still elements in $range
            // then this is a range. pop off the last
            // element, do the same as above and concatenate
            if (count($range)) {
                $endDate = array_pop($range);
                $str .= sprintf(' to %s', $endDate->format('D j M'));
            }

            echo "<p>$str</p>";
        }*/
    }

    private function groupByConsecutiveDays($checkins)
    {
        $dates = [];
        foreach ($checkins as $checkin) {
            $date = Carbon::createFromDate($checkin->created_at)->format('Y-m-d');
            $dates[] = [
                'date' => new \DateTime($date),
                'checkin' => $checkin
            ];
        }

        $lastDate = null;
        $ranges = array();
        $currentRange = array();

        foreach ($dates as $i => $dateArray) {
            $date = $dateArray['date'];
            $checkin = $dateArray['checkin'];
            if (null === $lastDate) {
                $currentRange[] = [
                    'date' => $date,
                    'checkin' => $checkin
                ];
            } else {

                // get the DateInterval object
                $interval = $date->diff($lastDate);

                // DateInterval has properties for
                // days, weeks. months etc. You should
                // implement some more robust conditions here to
                // make sure all you're not getting false matches
                // for diffs like a month and a day, a year and
                // a day and so on...

                if ($interval->days === 1) {
                    // add this date to the current range
                    $currentRange[] = [
                        'date' => $date,
                        'checkin' => $checkin
                    ];
                } else {
                    // store the old range and start anew
                    $ranges[] = $currentRange;
                    if ($i == 6) {
//                        dd($i, $currentRange);
                    }
                    $currentRange = [[
                        'date' => $date,
                        'checkin' => $checkin
                    ]];
                }
            }

            // end of iteration...
            // this date is now the last date
            $lastDate = $date;
        }

// messy...
        $ranges[] = $currentRange;
        return $ranges;
// print dates
        /*foreach ($ranges as $range) {

            // there'll always be one array element, so
            // shift that off and create a string from the date object
            $startDate = array_shift($range);
            $str = sprintf('%s', $startDate->format('D j M'));

            // if there are still elements in $range
            // then this is a range. pop off the last
            // element, do the same as above and concatenate
            if (count($range)) {
                $endDate = array_pop($range);
                $str .= sprintf(' to %s', $endDate->format('D j M'));
            }

            echo "<p>$str</p>";
        }*/
    }

}
