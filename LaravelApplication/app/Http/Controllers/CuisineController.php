<?php

namespace App\Http\Controllers;

use App\Cuisine;
use App\Http\Tasks\CuisineTask\CreateCuisineTask;
use App\Restaurant;
use Illuminate\Http\Request;

class CuisineController extends Controller
{

    /**
     *store cuisine

     * @param App\Http\Tasks\CuisineTask\CreateCuisineTask $task
     * @param Illuminate\Http\Request $request
     *
     * @return response 'success' with status code
     */
    public function store(Request $request, CreateCuisineTask $task)
    {
        $data = $request->all();

        $task->handle($data);

        return response('success', 200);
    }
}
