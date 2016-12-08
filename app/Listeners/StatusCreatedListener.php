<?php

namespace App\Listeners;

use App\Events\StatusCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StatusCreated  $event
     * @return void
     */
    public function handle(StatusCreated $event)
    {
        // when a new status is being created, i'd want to do nothing for now.

    }
}
