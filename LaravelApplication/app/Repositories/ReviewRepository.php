<?php

namespace App\Repositories;

use App\Review;

class ReviewRepository{
    public function find($id)
    {
        return Review::findOrFail($id);
    }

    public function comments($id)
    {
        return $this->find($id)->comments;
    }

    public function likes($id)
    {
        return $this->find($id)->likes;
    }
}
