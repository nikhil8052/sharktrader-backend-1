<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Casts\Attribute;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'referral_code',
        'phone_number',
        'email_verified_at',
        'payment_password',
        'google2fa_secret'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sharks(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Shark::class)->withPivot(['active', 'created_at', 'updated_at','active_until','id', 'present']);
    }

    public function strategies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Strategy::class);
    }

    public function teams(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'team_users')->withPivot(['level']);
    }

    public function deposits(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Deposit::class);
    }

    public function transfers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Transfer::class);
    }
    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }

    public function withdraws(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Withdraw::class);
    }

    public function wallet(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Wallet::class);
    }
    /**

     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */

    protected function google2faSecret(): Attribute
    {
        $return = new Attribute(
            get: fn ($value) =>  $value != '' ? decrypt($value) : '',
            set: fn ($value) =>  $value != '' ? encrypt($value) : '',
        );
        return $return;
    }

    public function toSearchableArray()
    {
        return [
            'email' => $this->email
        ];
    }

    public function otp(){
        return $this->hasOne(OtpTable::class);
    }

//    Using before
    public function reward(){
        return $this->hasOne(Rewards::class, 'user_id');
    }
//    now using this
    public function rewards(){
        return $this->hasMany(Rewards::class, 'user_id');
    }
    public function checkins(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Checkin::class, 'user_id', 'id');
    }
}
