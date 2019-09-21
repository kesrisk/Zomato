<?php

namespace App\Repositories;

use App\Review;

class ReviewRepository{

    /**
     * find review
     *
     * @param review_id $id
     *
     * @return review instance
     */
    public function find($id)
    {
        return Review::findOrFail($id);
    }

    /**
     * get review comments
     *
     * @param review_id $id
     *
     * @return collection of comments
     */
    public function comments($id)
    {
        return $this->find($id)->comments;
    }


    /**
     * get review likes
     *
     * @param review_id $id
     *
     * @return collection of likes
     */
    public function likes($id)
    {
        return $this->find($id)->likes;
    }
}
