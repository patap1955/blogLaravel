<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;

class SendPostNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to(config('mail.from.address'))->send($event->post);
    }
}
