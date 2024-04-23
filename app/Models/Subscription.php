<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'follow'
    ];

    // FindFollowers method in UserService
    public function FollowerIdentification()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // FindFollows method in UserService
    public function FollowIdentification()
    {
        return $this->belongsTo(User::class, 'follow');
    }
}
