<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait CommentTrait{

    public function createComment($object, $comment)
    {
        return $object->comments()->create(['comment' => $comment, 'user_id' => Auth::user()->id]);
    }
}
