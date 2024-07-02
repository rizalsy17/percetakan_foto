<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Barang;
use App\Observers\BarangObserver;
use App\Services\Login\LoginService;
use App\Services\Login\LoginServiceImplement;
use App\Repositories\Login\LoginRepository;
use App\Repositories\Login\LoginRepositoryImplement;
use App\Services\Supplier\SupplierService;
use App\Services\Supplier\SupplierServiceImplement;
use App\Repositories\Supplier\SupplierRepository;
use App\Repositories\Supplier\SupplierRepositoryImplement;

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

        $this->app->bind(SupplierRepository::class, SupplierRepositoryImplement::class);
        $this->app->bind(SupplierService::class, SupplierServiceImplement::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Barang::observe(BarangObserver::class);
        //
        // Inertia::share([
        //     'auth' => function () {
        //         $guard = Auth::guard('web')->check() ? 'web' : (Auth::guard('owner')->check() ? 'owner' : null);
        //         $authData = [
        //             'user' => Auth::user(),
        //             'guard' => $guard,
        //         ];
        //         dd($authData); // Add this line to debug
        //         return $authData;
        //     },
        // ]);
    
    }
}
