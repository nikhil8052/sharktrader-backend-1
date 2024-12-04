<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Deposit;
use App\Models\Transfer;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        return view('admin.index', ['user' => Auth::user()]);
    }

    public function users(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if ($request->filled('search')) {
            $users = DB::table('users')->where('email', 'LIKE', "%".$request->search.'%')->paginate(10);
        }  else if ($request->filled('search_id')) {
            $users = DB::table('users')->where('id', $request->search_id)->paginate(10);
        } else {
            $users = User::paginate(10);
        }

        return view('admin.users', ['users' => $users]);
    }

    public function wallet(Request $request, $user_id)
    {
        $user = User::findOrfail($user_id);

        $pendingApprovals = Withdraw::query()
            ->where('user_id', $user_id)
            ->where('status', 'Pending')
            ->paginate(10);

        return view('admin.wallet.index', [
            'user' => $user,
            'pendingApprovals' => $pendingApprovals
        ]);
    }

    public function deposits(User $user)
    {
        $deposits = Deposit::query()
            ->where('user_id', $user->id)
            ->paginate(10);

        return view('admin.wallet.deposits', [
            'deposits' => $deposits,
            'user'     => $user,
        ]);
    }

    public function withdraws(User $user)
    {
        $withdraws = Withdraw::query()
            ->where('user_id', $user->id)
            ->paginate(10);

        return view('admin.wallet.withdraws', [
            'withdraws' =>  $withdraws,
            'user'      => $user,
        ]);
    }

    public function transfers(User $user)
    {
        $transfers = Transfer::query()
            ->where('user_id', $user->id)
            ->paginate(10);

        return view('admin.wallet.transfers', [
            'transfers' => $transfers,
            'user'      => $user,

        ]);
    }
}
