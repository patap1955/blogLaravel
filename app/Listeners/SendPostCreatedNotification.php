<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Mail\PostCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPostCreatedNotification
{
    public function handle(PostCreated $event)
    {
        Mail::to(config('mail.from.address'))->send(new PostCreate($event->post));
    }
}
