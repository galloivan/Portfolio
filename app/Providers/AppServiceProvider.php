<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SetLocale;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register the SetLocale middleware globally
        Route::middleware('setlocale')->group(function () {
            //
        });

        // OR if you want to alias it for use in routes
        app('router')->aliasMiddleware('setlocale', SetLocale::class);
    }
}
