<?php

namespace App\Http\Controllers;

use App\Cuisine;
use App\Http\Tasks\CuisineTask\CreateCuisineTask;
use App\Restaurant;
use Illuminate\Http\Request;

class CuisineController extends Controller
{

    public function store(Request $request, CreateCuisineTask $task)
    {
        $data = $request->all();

        $task->handle($data);

        return response('success', 200);
    }
}
