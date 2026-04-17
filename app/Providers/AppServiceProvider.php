<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // هذا هو المكان الصحيح لها

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // فرض استخدام https فقط عندما يكون الموقع مرفوعاً (production)
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}