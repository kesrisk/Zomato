<?php

namespace App\Traits;

use App\Repositories\DistrictRepository;
use App\Repositories\StateRepository;

trait AddressTrait{



    public function createAddress($object, $data)
    {

        $stateRepository        = new StateRepository();

        $districtRepository     = new DistrictRepository();

        $data['state_id'] = $stateRepository->getId($data['district']);

        $data['district_id'] = $districtRepository->getId($data['district'], $data['state_id']);


        return $object->address()->create([
            'state_id' => $data['state_id'],
            'district_id' => $data['district_id'],
            'street' => $data['street'],
        ]);
    }
}
