<?php

namespace App\Repositories;

use App\Address;

class AddressRepository{

    public function find($id)
    {
        return Address::findOrFail($id);
    }

    public function state($address)
    {
        return $address->state;
    }

    public function district($address)
    {
        return $address->district;
    }
}
