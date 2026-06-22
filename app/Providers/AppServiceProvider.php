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
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            try {
                if (\Illuminate\Support\Facades\Schema::hasTable('data_statistik')) {
                    $view->with('stats', \App\Models\DataStatistik::find(1));
                }
            } catch (\Exception $e) {
                // Fail silently if DB not ready
            }
        });
    }
}
