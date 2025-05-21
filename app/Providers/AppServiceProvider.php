<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
        Gate::define('super-admin', function ($user) {
            return $user->temPermissao('super-admin');
        });
        Gate::define('admin', function ($user) {
            return $user->temPermissao('admin');
        });
    }
}
