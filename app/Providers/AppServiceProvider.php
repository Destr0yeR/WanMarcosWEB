<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\API\Auth\EndUserAuthManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $auth = new  EndUserAuthManager($this->app);

        $this->app->instance('endUserAuth', $auth);

        $this->app->bind('App\Services\RequestInterface', 'App\Services\CurlRequest');
    }
}
