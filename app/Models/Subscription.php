<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'follow'
    ];

    // FindFollowers method in UserService
    /**
     * @return BelongsTo<User, self>
     */
    public function FollowerIdentification(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // FindFollows method in UserService
    /**
     * @return BelongsTo<User, self>
     */
    public function FollowIdentification(): BelongsTo
    {
        return $this->belongsTo(User::class, 'follow');
    }
}
