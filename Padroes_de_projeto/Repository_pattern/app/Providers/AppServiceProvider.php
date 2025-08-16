<?php

namespace App\Providers;

use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\Interfaces\EloquenetRepositoryInterface;
use App\Repository\Interfaces\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EloquenetRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
