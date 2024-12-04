<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrategyCryptoEarnins extends Model
{
    use HasFactory;

    protected $fillable = [
        'btc',
        'sol',
        'etc',
        'link',
        'eth',
        'ada',
        'strategy_id'
    ];
}
