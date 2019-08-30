<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class CartRepository{


    public function updateCart($cart, $restaurant_id)
    {
        return $cart->update(['restaurant_id' => $restaurant_id]);
    }

    public function cart()
    {
        $user = Auth::user();

        return $user->cart;
    }

    public function attachProductToCart($cart, $cuisine_id, $quantity)
    {
        $cart->cuisines()->attach($cuisine_id, ['quantity'=>$quantity]);

        return ['message' => 'successfully added to cart'];
    }

    public function cuisines($cart)
    {
        return $cart->cuisines;
    }
}
