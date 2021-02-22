<?php

namespace App\Listeners;

use App\Events\PostUpdated;
use App\Mail\PostUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPostUpdatedNotification
{

    public function handle(PostUpdated $event)
    {
        Mail::to(config('mail.from.address'))->send(new PostUpdate($event->post));
    }
}
