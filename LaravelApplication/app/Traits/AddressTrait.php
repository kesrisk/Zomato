<?php

namespace App\Traits;

trait AddressTrait{

    public function createAddress($object, $data)
    {
        return $object->address()->create($data);
    }
}
