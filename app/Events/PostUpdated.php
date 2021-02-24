<?php

namespace App\Events;

use App\Mail\PostUpdate;
use App\Models\Post;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostUpdated
{
    use Dispatchable, SerializesModels;

    public $post;

    private $events = 'updated';

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getEvent()
    {
        return $this->events;
    }
}
