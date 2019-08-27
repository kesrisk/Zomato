<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     *
     * @input type(commentable type), id(of commentable type), user_id
     *
     */
    public function storeComment(Request $request)
    {
        $data = [
            'user_id' => $request['user_id'],
            'commentable_id' => $request['id'],
            'commentable_type' => $request['type'],
            'comment' => $request['comment'],
        ];

        return Comment::create($data);

    }
}
