<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Login\LoginService;
use App\Services\Login\LoginServiceImplement;
use App\Repositories\Login\LoginRepository;
use App\Repositories\Login\LoginRepositoryImplement;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(LoginRepository::class, LoginRepositoryImplement::class);
        $this->app->bind(LoginService::class, LoginServiceImplement::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
