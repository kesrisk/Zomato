<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

class CommentTrait{

    public function create($object, $comment)
    {
        return $object->comments()->create(['comment' => $comment, 'user_id' => Auth::user()->id]);
    }
}
