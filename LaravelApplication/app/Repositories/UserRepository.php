<?php

namespace App\Repositories;

use App\User;

class UserRepository{


    /**
     * create user
     *
     * @return User instance
     */
    public function create($data)
    {
        return User::create($data);
    }
}
