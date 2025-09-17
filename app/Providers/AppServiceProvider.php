<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\FinancialTransaction;
use App\Observers\FinancialTransactionObserver;
use Laravel\Passport\Passport;

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
        Passport::enablePasswordGrant();
        FinancialTransaction::observe(FinancialTransactionObserver::class);
    }
}
