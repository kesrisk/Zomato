<?php

namespace App\Transformers;

use App\District;
use App\State;

class UserTransformer extends ApiTransformer{

    public function address($data)
    {
        return $data->map(function($address){
            return [
                'id'            => $address['id'],
                'street'        => $address['street'],
                'district'      => District::findOrFail($address['district_id'])->name,
                'state'         => State::findOrFail($address['state_id'])->name,
            ];
        });
    }

    public function login($data)
    {
        return response($data);
    }

    public function register($data)
    {
        return response($data);
    }

}
