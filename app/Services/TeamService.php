<?php

namespace App\Services;

use App\Models\ChFavorite;
use App\Models\PhoneNumbers;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeamService
{

    public function handle(array $data)
    {
        $code = Str::random(8);

        $phoneNumber = PhoneNumbers::create([
            'user_id'           =>  null,
            'phone_number'      => $data['telephone'],
            'verification_code' => $code
        ]);

        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'referral_code' => Str::random(7),
            'phone_number'  => $data['telephone']
        ];
        if (isset($data['google2fa_secret'])){
            $userData['google2fa_secret'] = $data['google2fa_secret'];
        }
        $user = User::create($userData);

        $phoneNumber->update([
            'user_id' => $user->id,
        ]);

        $user->wallet()->create([
            'amount' => 0,
            'type' => 'ERC2',
        ]);

        return $this->createAppropriateTeams($data, $user);
    }

    private function createAppropriateTeams($data, $user)
    {

        $my_team = Team::create([
            'referral_code'          => $user->referral_code,
            'received_commission'    => 0,
            'accumulated_commission' => 0,
            'parent_id'              => null,
            'owner'                  => $user->id,
            'owner_email'            => $user->email,
        ]);

        $user->teams()->attach($my_team,[
            'level' => 0,
        ]);

        if ($data['referral_code']) {
            $this->teamMembers($data, $user, $my_team);
        }

        ChFavorite::create([
            'user_id' => $user->id,
            'favorite_id' => 1,
        ]);

        return $user;
    }

    public function teamMembers($data, $user, $my_team): void
    {

        $team = Team::query()
            ->where('referral_code', $data['referral_code'])
            ->first();

        $my_team->update([
           'parent_id' => $team->id,
        ]);

        $user->teams()->attach($team,[
            'parent_id' => 1,
            'level' => 1,
        ]);
    }
}
