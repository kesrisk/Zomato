<?php

namespace App\Repositories;

use App\Comment;

class CommentRepository{

    public function create($data)
    {
        return Comment::create($data);
    }
}
