<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $guarded = ['id'];

    public function scopeWaiting($query){
        return $query->where('payment_status', 'waiting');
    }
    public function scopeFinished($query){
        return $query->where('payment_status', 'finished');
    }
    public function scopeCanceled($query){
        return $query->where('payment_status', 'canceled');
    }
}
