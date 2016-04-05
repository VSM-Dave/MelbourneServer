<?php

namespace Melbourne\Providers;

use Melbourne\View\Composers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['view']->composer('layouts.auth', Composers\AddStatusMessage::class);
        $this->app['view']->composer('layouts.admin', Composers\AddAdminUser::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
