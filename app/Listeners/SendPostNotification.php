<?php

namespace App\Listeners;

use App\Mail\PostCreate;
use App\Mail\PostDelete;
use App\Mail\PostUpdate;
use Illuminate\Support\Facades\Mail;

class SendPostNotification
{
    protected $render = [
        'created' => PostCreate::class,
        'updated' => PostUpdate::class,
        'deleted' => PostDelete::class,
    ];

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $render = $this->render[$event->getEvent()];
        if ($email = config('mail.from.address')) {
            Mail::to($email)->send(new $render($event->post));
        }


    }
}
