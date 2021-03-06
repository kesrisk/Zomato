<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Tasks\UserTask\CreateAddressTask;
use App\Http\Tasks\UserTask\LoginTask;
use App\Http\Tasks\UserTask\RegisterTask;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $transformer;

    public function __construct(UserTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * Register a new user
     *
     * @param App\Http\Requests\RegisterRequest $request
     * @return response user details and access_token
     */
    public function register(RegisterRequest $request, RegisterTask $task)
    {
        return $this->transformer->register($task->handle($request->all()));
    }

    /**
     * log in.
     *
     * @param App\Http\Requests\LoginRequest $request
     * @return response user details and access_token
     */
    public function login(LoginRequest $request, LoginTask $task)
    {
        return $this->transformer->login($task->handle($request->all()));
    }


    /**
     * add address
     *
     * @param App\Http\Tasks\UserTask\CreateAddressTask $task;
     * @param Illuminate\Http\Request $request
     *
     * @return response user address
     */
    public function addAddress(Request $request, CreateAddressTask $task)
    {
        return $task->handle($request->all());
    }

    /**
     * get address
     *
     *
     * @return response user address
     */

    public function address()
    {
        $user = Auth::user();

        return $this->transformer->address($user->address);
    }

}
