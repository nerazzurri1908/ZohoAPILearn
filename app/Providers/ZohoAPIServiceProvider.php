<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ZohoAPIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
$this->app->bind(
    'App\Http\Common\IZohoAPI',
    'App\Http\Common\ZohoAPI'
);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
