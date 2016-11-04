<?php

namespace App\Providers;

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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
        |--------------------------------------------------------------
        | Registration Application's Services
        |--------------------------------------------------------------
        |
        | All registration of application's services happen here, stuff
        | that's kinda hard to explain...okay, they are namespace
        | changes made to the namespace of your services so
        | that you could shorthand them, really cool stuff
        |
        */

        $this->app->bind(
            'ProcessImage',
            'App\Services\ProcessImage'
        );

        $this->app->bind(
            'App\Repositories\Feed\UserRepository',
            'App\Repositories\Feed\EloquentUserRepository'
        );

        $this->app->bind(
            'App\Repositories\User\StatusCommendRepository',
            'App\Repositories\User\EloquentStatusCommendRepository'
        );

    }


}
