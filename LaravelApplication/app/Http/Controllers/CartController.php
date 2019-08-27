<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addToCart(Request $request, $restaurant_id, $cuisine_id)
    {
        $user = Auth::user();

        $cart = $user->cart;

        $restaurant_id = intVal($restaurant_id);

        if($cart->restaurant_id === null || $cart->restaurant_id == $restaurant_id)
        {
            if($cart->restautant_id === null)
            {
                $cart->update(['restaurant_id' => $restaurant_id]);
            }
            $cart->cuisines()->attach($cuisine_id);

            return ['message' => 'successfully added to cart'];
        }

        $user->cart->cuisines()->detach();

        $cart->update(['restaurant_id' => $restaurant_id]);

        $cart->cuisines()->attach($cuisine_id);

        return ['message' => 'successfully added to cart'];

    }


}
