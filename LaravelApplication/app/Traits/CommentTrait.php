<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait CommentTrait{

    public function createComment($instance, $comment)
    {
        $instance->comments()->create(['comment' => $comment, 'user_id' => Auth::user()->id]);
        return response('success', 200);
    }
}
