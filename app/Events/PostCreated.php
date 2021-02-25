<?php

namespace App\Events;

use App\Mail\PostCreate;
use App\Models\Post;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostCreated
{
    use Dispatchable, SerializesModels;

    public $post;

    private $events = 'created';

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
