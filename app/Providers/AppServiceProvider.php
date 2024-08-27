<?php

namespace App\Providers;

use App\Contracts\LikeService;
use App\Contracts\PostService;
use App\Contracts\UserService;
use App\Services\LikeServiceDefault;
use App\Services\PostServiceDefault;
use App\Services\UserServiceDefault;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostService::class, PostServiceDefault::class);
        $this->app->bind(UserService::class, UserServiceDefault::class);
        $this->app->bind(LikeService::class, LikeServiceDefault::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
