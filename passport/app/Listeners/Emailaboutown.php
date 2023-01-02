<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use App\Mail\Usersubscribedmessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Emailaboutown
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
     * @param  object  $event
     * @return void
     */
    public function handle(UserSubscribed $event)
    {
        Mail::to($event->email)->send(new Usersubscribedmessage($event->email, $event->name));
    }
}
