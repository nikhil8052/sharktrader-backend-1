<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use App\Models\Team;
use App\Models\Wallet;
use App\Models\Strategy;
use App\Models\TeamUser;
use function Termwind\render;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $levels = [];
        $user = Auth::user();

        $myTeam = $user->teams->where('referral_code', $user->referral_code)->first();
        $myTeamUsers = [];
        if ($myTeam){
            $myTeamUsers = $myTeam->descendantsAndSelf()->depthFirst()->get();
            $myTeamUsers->each(function ($team) use (&$levels){
                $strategy = Strategy::where('user_id', $team->id)->where('status', '=', 'active')->first();
                $user = User::where('id', $team->id)->where('active_status', '=', 'active')->first();
                if ($user){
                    $user->created_date = ($user && $user->created_at && $user->created_at != '') ? Carbon::createFromDate($user->created_at)->format('d-m-Y') : '';
                    $strategyAmount = Strategy::where('user_id', $team->id)->where('status', '=', 'active')->sum('amount');
                    $wallet = Wallet::where('user_id', $team->id)->first();
                    $team->balance = $wallet ? $wallet->amount + $strategyAmount : null;
                    $team->strategy = $strategy;
                    $team->user = $user;
                    $levels[$team->depth][] = $team;
                }
            });
        }


        return view('teams.my-team.index', [
            'user'   => $user,
            'myTeam' => $myTeam ,
            'levels' => $levels
        ]);
    }

    public function claimCommission(Team $team)
    {
        try {
            $user = Auth::user();

            if ($team->received_commission == 0){
                return redirect()->back()->with('error', 'Refer your friends to accumulate commission !');
            }

            $user->wallet->update([
               'amount' => $user->wallet->amount + $team->received_commission,
            ]);

            $team->update([
               'received_commission' => 0,
            ]);

            return redirect()->back()->with('success', 'Successfully received the commision');

        }catch (Exception $exception){
            Log::error('Cannot receive commission !'.$exception);
            return redirect()->back()->with('error', 'Cannot receive commission right now !');

        }
    }
}
