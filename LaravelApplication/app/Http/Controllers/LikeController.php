<?php

namespace App\Http\Controllers;

use App\Http\Tasks\LikeTask\ToggleLikeTask;
use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Request $request, ToggleLikeTask $task)
    {
        return $task->handle($request->all());
    }
}
