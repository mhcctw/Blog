<?php

namespace App\Providers;

use App\Contracts\PostService;
use App\Services\PostServiceDefault;
use App\Contracts\UserService;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
