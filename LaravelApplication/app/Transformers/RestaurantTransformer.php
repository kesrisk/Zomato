<?php

namespace App\Transformers;

class RestaurantTransformer
{
    public function restaurant($data)
    {
        return [
            'name' => $data['name'],
            'description' => $data['description'],
            'phone_number' => $data['phone_number']
        ];
    }

    public function address($data)
    {
        return [
            'state_id' => $data['state_id'],
            'district_id' => $data['district_id'],
            'street' => $data['street'],
        ];
    }
}
