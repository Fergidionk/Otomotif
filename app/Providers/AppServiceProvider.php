<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\PendaftaranObserver;
use App\Models\Pendaftaran;

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
        Pendaftaran::observe(PendaftaranObserver::class);
    }
}
