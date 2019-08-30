<?php

namespace App\Http\Tasks\UserTask;

class CreateAddressTask{
    public function handle($data)
    {
        $user = Auth::user();

        ;

        return $user->address()->create($data);
    }
}
