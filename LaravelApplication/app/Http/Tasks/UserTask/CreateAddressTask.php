<?php

namespace App\Http\Tasks\UserTask;

class CreateAddressTask{
    public function handle($data)
    {
        $user = Auth::user();

        $data = [
            'state_id'      => $data['state_id'],
            'district_id'   => $data['district_id'],
            'street'        => $data['street'],
        ];

        return $user->address()->create($data);
    }
}
