<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminInfoController extends Controller
{
    public function index(User $user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $myTeam = Team::with('users')
            ->where('referral_code', $user->referral_code)->first();


        return view('admin.info.index', [
            'myteam' => $myTeam,
            'user' => $user,
        ]);
    }

}
