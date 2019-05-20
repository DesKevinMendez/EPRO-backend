<?php

namespace App\Listeners;

use App\Events\SeendQR;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\accessToParking;

class EventSeendQR
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
     * @param  SeendQR  $event
     * @return void
     */
    public function handle(SeendQR $event)
    {
        Mail::to($event->user)->queue(
            new accessToParking($event->user)
        );
    }
}
