<?php

namespace App\Http\Tasks;

use App\Restaurant;

class CreateRestaurantTask
{
    public function handle($data)
    {
        $restaurant = Restaurant::create([
            'name'          => $data['name'],
            'description'   => $data['description'],
            'phone_number'  => $data['phone_number']
        ]);

        $address = $restaurant->address()->create([
            'state_id'      => $data['state_id'],
            'district_id'   => $data['district_id'],
            'street'        => $data['street'],
        ]);

        return [
            'restaurant'    => $restaurant,
            'address'       => $address,
        ];
    }
}
