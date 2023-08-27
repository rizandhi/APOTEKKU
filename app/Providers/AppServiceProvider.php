<?php

namespace App\Providers;

use App\Models\Penjualan;
use App\Models\Pengeluaran;
use App\Observers\RekapObserver;
use App\Observers\PengeluaranObserver;
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
    public function boot()
{
    Penjualan::observe(RekapObserver::class);
    Pengeluaran::observe(PengeluaranObserver::class);
}
}
