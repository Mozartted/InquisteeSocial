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
            'App\Repositories\User\UserRepository',
            'App\Repositories\User\EloquentUserRepository'
        );

        $this->app->bind(
            'App\Repositories\Status\StatusCommendRepository',
            'App\Repositories\Status\EloquentStatusCommendRepository'
        );

        $this->app->bind(
            'App\Repositories\Messages\MessageRepository',
            'App\Repositories\Messages\EloquentMessageRepository'
        );

        $this->app->bind(
            'App\Repositories\Profiles\ProfilesRepository',
            'App\Repositories\Profiles\EloquentProfilesRepository'
        );

    }


}
