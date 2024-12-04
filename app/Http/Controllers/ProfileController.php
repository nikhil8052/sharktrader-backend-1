<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function profile(User $user)
    {
        return view('user.profile', ['user' => Auth::user()]);
    }
    public function updateProfile(Request $request)
    {
        $user = \auth()->user();
        $user->name = $request->full_name;
        if ($user->email != $request->email){
            $user->email = $request->email;
            $user->email_verified_at = null;
            if ($user->save()){
                $user->sendEmailVerificationNotification();
            }
        }
        $user->save();
        return redirect()->back();
    }
    public function show(User $user): array
    {
        return $this->profileResponse($user);
    }

    public function follow(User $user): array
    {
        auth()->user()->following()->attach($user->id);

        return $this->profileResponse($user);
    }

    public function unfollow(User $user): array
    {
        auth()->user()->following()->detach($user->id);

        return $this->profileResponse($user);
    }

    protected function profileResponse(User $user): array
    {
        return ['profile' => $user->only('username', 'bio', 'image')
            + ['following' => $this->user->doesUserFollowAnotherUser(auth()->id(), $user->id)]];
    }
}
