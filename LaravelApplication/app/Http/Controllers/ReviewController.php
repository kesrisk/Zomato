<?php

namespace App\Http\Controllers;

use App\Like;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function comments($id)
    {
        $review = Review::findOrFail($id);
        return $review->comments;
    }

    public function likes($id)
    {
        $review = Review::findOrFail($id);
        return $review->likes;
    }

    public function storeComment($id, Request $request)
    {
        $review = Review::findOrFail($id);
        return $review->comments()->create($request->all());
    }

    public function toggleLike($id, Request $request)
    {
        $user_id = $request['user_id'];
        $review = Review::findOrFail($id);
        $likes = $this->likes($id);

        $likes = $likes->firstWhere('user_id' , $user_id);

        if ($likes !== null)
        {
            Like::findOrFail($likes->id)->delete();
            return ['like removed' => true];
        }
        $review->likes()->create(['user_id' => $request['user_id']]);
        return ['like_added' => true];

    }
}
