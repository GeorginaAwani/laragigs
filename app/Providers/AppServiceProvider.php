<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
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
        // alternatively, you can use this to allow mass assignment of model properties. This removes all restrictions. If using this option, ensure you validate form data
        Model::unguard();

        // uses bootstrap instead of tailwind for pagination
        Paginator::useBootstrapFive();
    }
}
