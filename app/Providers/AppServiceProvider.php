<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Repositories
        $this->app->bind('App\Repositories\Interfaces\IUrlRepository', 'App\Repositories\UrlRepository');

        // Services
        $this->app->bind('App\Services\Interfaces\IUrlService', 'App\Services\UrlService');


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
