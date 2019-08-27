<?php

namespace App\Http\Tasks\UserTask;

use App\User;

class RegisterTask{
    public function handle($data)
    {
        $data['password'] = bcrypt($data['password']);

        unset($data['password_confirmation']);

        $user = User::create($data);

        $user->cart()->create();

        $token = $user->createToken('authToken')->accessToken;

        $name =  $user->name;

        return ['token' => $token, 'name' => $name];
    }
}
