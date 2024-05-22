<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

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
        //
        $this->registerMiddleware();
    }

    protected function registerMiddleware(): void
    {
        // Registering auth.basic middleware
        Route::aliasMiddleware('auth.basic', \App\Http\Middleware\BasicAuthMiddleware::class);
    }
}
