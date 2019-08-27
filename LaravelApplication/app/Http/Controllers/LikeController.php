<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Request $request)
    {
        $data = [
            'user_id' => $request['user_id'],
            'likeable_id' => $request['id'],
            'likeable_type' => $request['type'],
        ];

        $query=Like::where('user_id', $request['user_id'])->where('likeable_id', $request['id'])->where('likeable_type', $request['type']);

        $count = count($query->get());

        if ($count > 0)
        {
            return $query->delete();
        }
        return Like::create($data);
    }
}
