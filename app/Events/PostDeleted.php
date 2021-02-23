<?php

namespace App\Events;

use App\Mail\PostDelete;
use App\Models\Post;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostDeleted
{
    use Dispatchable, SerializesModels;

    public $post;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = new PostDelete($post);
    }
}
