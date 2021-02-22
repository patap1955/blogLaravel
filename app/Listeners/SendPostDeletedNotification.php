<?php

namespace App\Listeners;

use App\Events\PostDeleted;
use App\Mail\PostDelete;
use Illuminate\Support\Facades\Mail;

class SendPostDeletedNotification
{
    public function handle(PostDeleted $event)
    {
        Mail::to(config('mail.from.address'))->send(new PostDelete($event->post));
    }
}
