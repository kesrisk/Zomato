<?php

namespace App\Http\Tasks\CommentTask;

use App\Traits\CommentTrait;

class StoreCommentTask{

    use CommentTrait;

    public function handle($instance, $comment)
    {
        return $this->createComment($instance, $comment);
    }
}
