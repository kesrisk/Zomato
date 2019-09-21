<?php

namespace App\Http\Tasks\OrderTask;

use App\Repositories\AddressRepository;
use App\Repositories\OrderRepository;

class ShowOrderTask{

    private $orderRepository;
    private $addressRepository;

    public function __construct(OrderRepository $orderRepository, AddressRepository $addressRepository)
    {
        $this->orderRepository      = $orderRepository;
        $this->addressRepository    = $addressRepository;
    }

    public function handle($id)
    {
        $order = $this->orderRepository->find($id);

        $address = $this->addressRepository->find($order->address_id);

        $cuisines = $this->orderRepository->cuisines($order);

        return ['cuisines' => $cuisines, 'address' => $address];
    }
}
