<?php

namespace App\Providers;

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
        if($auth_token = request()->cookie('auth_token')){
            request()->headers->set('Authorization', 'Bearer ' . $auth_token);
        }
    }
}
