<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Team extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;

    protected $fillable = [
        'level',
        'received_commission',
        'accumulated_commission',
        'referral_code',
        'level',
        'owner',
        'parent_id',
        'owner_email',
    ];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'team_users')->withPivot(['level']);
    }
}
