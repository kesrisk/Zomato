<?php

namespace App\Repositories;

use App\Comment;

class CommentRepository{


    /**
     * find attachment
     *
     * @param $request data
     *
     * @return Comment object
     */
    public function create($data)
    {
        return Comment::create($data);
    }
}
