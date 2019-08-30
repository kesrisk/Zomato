<?php

namespace App\Http\Tasks\UserTask;

use App\Repositories\UserRepository;
use App\User;

class RegisterTask{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function token($user)
    {
        return $user->createToken('authToken')->accessToken;
    }

    public function handle($data)
    {
        $data['password'] = bcrypt($data['password']);

        unset($data['password_confirmation']);

        $user = $this->userRepository->create($data);

        $user->cart()->create();

        $token = $this->token($user);

        return ['token' => $token, 'name' => $user->name];
    }
}
