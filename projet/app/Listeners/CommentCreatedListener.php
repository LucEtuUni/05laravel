<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CommentCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewComment $event)
    {
        $user = $event->post->user; 
        $comment = $event->comment; 

        $user->notify(new NewCommentNotification($comment, $event->post));
    }
}
