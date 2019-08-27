<?php

namespace App\Http\Tasks\UserTask;

class LoginTask{

    public function handle($data)
    {
        if(!auth()->attempt($data))
        {
            return response(['message' => 'Invalid Crediantials']);
        }

        $token = auth()->user()->createToken('authToken')->accessToken;

        return ['name' => auth()->user()->name, 'token'=> $token];
    }
}
