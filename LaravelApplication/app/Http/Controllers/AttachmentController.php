<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Like;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function likes($id)
    {
        return Attachment::findOrFail($id)->likes;
    }

    public function comments($id)
    {
        return Attachment::findOrFail($id)->comments;
    }

    public function store(Request $request)
    {
        $data = [
            'attachable_id' => $request['id'],
            'attachable_type' => $request['type'],
            'image_url' => $request['image_url']
        ];
        return Attachment::create($data);
    }

    // public function storeComment($id, Request $request)
    // {
    //     $attachment = Attachment::findOrFail($id);
    //     return $attachment->comments()->create($request->all());
    // }

    // public function toggleLike($id, Request $request)
    // {
    //     $user_id = $request['user_id'];
    //     $attachment = Attachment::findOrFail($id);

    //     $likes = $attachment->likes;

    //     $likes = $likes->firstWhere('user_id' , $user_id);

    //     if ($likes !== null)
    //     {
    //         Like::findOrFail($likes->id)->delete();
    //         return ['like removed' => true];
    //     }
    //     $attachment->likes()->create(['user_id' => $request['user_id']]);
    //     return ['like_added' => true];

    // }
}
