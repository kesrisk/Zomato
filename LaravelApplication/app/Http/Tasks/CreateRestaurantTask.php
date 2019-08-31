<?php

namespace App\Http\Tasks;

use App\Restaurant;
use App\Traits\AddressTrait;

class CreateRestaurantTask
{
    use AddressTrait;

    public function handle($data)
    {
        $restaurant = Restaurant::create([
            'name'          => $data['name'],
            'description'   => $data['description'],
            'phone_number'  => $data['phone_number']
        ]);

        $this->createAddress($restaurant,
        [
            'state'      => $data['state'],
            'district'   => $data['district'],
            'street'        => $data['street'],
        ]);

        return response('successfully created', 200);
    }
}
