<?php

namespace App\Transformers;

use App\State;

class RestaurantTransformer
{
    public function store($data)
    {
        return [
            'name' => $data['restaurant']->name,
            'description' => $data['restaurant']->description,
            'phone_number' => $data['restaurant']->phone_number,
            'state' => State::findOrFail($data['address']->state_id)->name,
            'district' => State::findOrFail($data['address']->district_id)->name,
            'street' => $data['address']->street,
        ];
    }
}
