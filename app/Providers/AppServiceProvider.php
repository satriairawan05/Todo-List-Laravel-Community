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
        \Illuminate\Database\Eloquent\Model::unguard();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Locale
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Illuminate\Support\Facades\App::setLocale('id');

        // Pagination
        \Illuminate\Pagination\Paginator::useBootstrapFive();
    }
}
