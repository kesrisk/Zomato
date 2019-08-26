<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Register a new user
     *
     * @param App\Http\Requests\RegisterRequest $request
     * @return response user details and access_token
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        unset($data['password_confirmation']);
        // return $data;


        $user = User::create($data);
        // $user->cart()->create();

        $success['token'] = $user->createToken('authToken')->accessToken;
        $success['name'] =  $user->name;

        return response(['success'=>$success]);

        // return response(['user' => $user, 'access_token'=> $token]);
    }

    /**
     * log in.
     *
     * @param App\Http\Requests\LoginRequest $request
     * @return response user details and access_token
     */
    public function login(LoginRequest $request)
    {
        $loginData = $request->all();


        if(!auth()->attempt($loginData))
        {
            return response(['message'=> 'Invalid Crediantials']);
        }

        $token = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token'=> $token]);
    }



}
