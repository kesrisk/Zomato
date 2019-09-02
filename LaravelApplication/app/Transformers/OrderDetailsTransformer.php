<?php

namespace App\Transformers;

use App\Repositories\AddressRepository;


class OrderDetailsTransformer{

    private $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function transform($cuisines, $address)
    {
        $cuisines = $cuisines->map(function ($cuisine){
            return [
                'id'        => $cuisine['id'],
                'name'      => $cuisine['name'],
                'quantity'  => $cuisine->pivot['quantity'],
                'cost'      => $cuisine->pivot['cost']
            ];
        });

        return [
            'cuisines'  => $cuisines,
            'address'   => [
                'state'     => $this->addressRepository->state($address)->name,
                'district'  => $this->addressRepository->district($address)->name,
                'street'    => $address['street']
            ]
        ];
    }
}
