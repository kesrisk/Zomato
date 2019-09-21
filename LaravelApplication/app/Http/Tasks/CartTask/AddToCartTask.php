<?php

namespace App\Http\Tasks\CartTask;

use App\Repositories\CartRepository;


class AddToCartTask{

    private $repository;

    public function __construct(CartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($restaurant_id, $cuisine_id)
    {
        $cart = $this->repository->userCart();

        if($cart->restaurant_id === $restaurant_id)
        {

            return $this->repository->attachProductToCart($cart, $cuisine_id, 1);
        }

        $cart->clear();

        $this->repository->updateCart($cart, $restaurant_id);

        return $this->repository->attachProductToCart($cart, $cuisine_id, 1);
    }
}
