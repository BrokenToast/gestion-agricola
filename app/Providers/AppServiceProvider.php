<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

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
        Pluralizer::plural("spanish");
        Password::default(function () {
            return Password::min(8)
                ->mixedCase()
                ->symbols()
                ->numbers();
        });
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
