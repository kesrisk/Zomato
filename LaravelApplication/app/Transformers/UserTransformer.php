<?php

namespace App\Transformers;

use App\District;
use App\State;

class UserTransformer extends ApiTransformer{

    private $districtRepository;
    private $stateRepository;

    public function __construct(DistrictRepository $districtRepository, StateRepository $stateRepository)
    {
        $this->districtRepository   = $districtRepository;
        $this->stateRepository      = $stateRepository;
    }

    public function address($data)
    {
        return $data->map(function($address){
            return [
                'id'            => $address['id'],
                'street'        => $address['street'],
                'district'      => $this->districtRepository->find($address['district_id'])->name,
                'state'         => $this->stateRepository->find($address['state_id'])->name,
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
