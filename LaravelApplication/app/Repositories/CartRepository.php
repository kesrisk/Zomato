<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class CartRepository{


    /**
     * update cart's restaurant_id
     *
     * @param cart instance
     * @param attachment_id $id
     *
     * @return bool
     */
    public function updateCart($cart, $restaurant_id)
    {
        return $cart->update(['restaurant_id' => $restaurant_id]);
    }


    /**
     * userCart
     *
     *
     * @return UserCart Instance
     */
    public function UserCart()
    {
        $user = Auth::user();

        return $user->cart;
    }


    /**
     * attach cuisines to cart
     *
     * @param App\Cart $cart
     * @param cuisine_id $cuisine_id
     * @param int $quantity
     *
     * @return attachment instance
     */
    public function attachProductToCart($cart, $cuisine_id, $quantity)
    {
        $cart->cuisines()->attach($cuisine_id, ['quantity'=>$quantity]);

        return response('successfully added to cart', 200);
    }


    /**
     * get cart cuisines
     *
     * @param App\Cart $cart
     *
     * @return collection of all cart cuisines
     */
    public function cuisines($cart)
    {
        return $cart->cuisines;
    }
}
