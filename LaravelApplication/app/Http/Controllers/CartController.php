<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $cart = $user->cart;

        $cuisines = $cart->cuisines;

        //cost of cuisine????
        $restaurant_id = $cart['restaurant_id'];

        return $cuisines->map(function($cuisine) use ($restaurant_id){

            $costQuerry = DB::table('cuisine_restaurant')->where('cuisine_id', $cuisine['id'])->where('restaurant_id', $restaurant_id)->get('cost');

            $cost = $costQuerry[0]->cost;

            return [
                'id' => $cuisine['id'],
                'name' => $cuisine['name'],
                'description' => $cuisine['description'],
                'quantity' => $cuisine->pivot['quantity'],
                'cost' => $cost,
            ];
        });

    }

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

            $cart->cuisines()->attach($cuisine_id, ['quantity'=>1]);

            return ['message' => 'successfully added to cart'];
        }

        $user->cart->cuisines()->detach();

        $cart->update(['restaurant_id' => $restaurant_id]);

        $cart->cuisines()->attach($cuisine_id);

        return ['message' => 'successfully added to cart'];
    }


}
