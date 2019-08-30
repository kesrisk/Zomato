<?php

namespace App\Http\Tasks\CartTask;

use App\Repositories\CartRepository;

class ShowCartTask{

    private $repository;

    public function __construct(CartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($restaurant_id){

        $cart = $this->repository->userCart();

        if($restaurant_id !== $cart['restaurant_id'])
        {
            return null;
        }

        $cuisines = $cart->cuisines;

        return ['cuisines' => $cuisines, 'restaurant_id' => $restaurant_id];
    }
}
