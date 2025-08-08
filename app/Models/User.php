<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $usersPosts
 * @property \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $subscribers
 * @property \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $subscribersUsers
 * @property \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $subscriptionsUsers
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'photo',
        'password',
        'role',
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
        'password' => 'hashed',
    ];

    // All user's posts
    /**
     * @return HasMany<Post>
     */
    public function usersPosts(): HasMany
    {

        return $this->hasMany(Post::class, 'user_id', 'id')->orderBy('created_at', 'desc');        
    }

    // All user's subscribers with information
    /**
     * @return BelongsToMany<User>
     */
    public function subscribersUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'follow', 'user_id');
    }

    // All user's count subscribers
    /**
     * @return HasMany<Subscription>
     */
    public function subscribers(): HasMany
    {
        return $this->hasMany(Subscription::class, 'follow')->orderBy('created_at', 'desc');
    }

    // All user's subscriptions with information
    /**
     * @return BelongsToMany<User>
     */
    public function subscriptionsUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'user_id', 'follow');
    }

    // All user's count subscriptions
    /**
     * @return HasMany<Subscription>
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class, 'user_id')->orderBy('created_at', 'desc');
    }

    // Check subscription for chosen user $targetUserId
    public function isSubscribedTo(int $targetUserId): bool
    {
        return $this->subscriptions()->where('follow', $targetUserId)->exists();
    }
}
