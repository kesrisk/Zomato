<?php

namespace App\Http\Tasks\AddressTask;

use App\Traits\AddressTrait;

class StoreAddressTask{

    use AddressTrait;

    public function handle($instance, $data)
    {
        return $this->createAddress($instance, $data);
    }
}
