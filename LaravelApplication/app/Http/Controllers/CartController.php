<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Transformers\CartTransformer;

class CartController extends Controller
{
    private $transform;

    public function __construct(CartTransformer $transform){
        $this->transform = $transform;
    }

    public function index($restaurant_id)
    {
        $user = Auth::user();

        $cart = $user->cart;

        if(intval($restaurant_id) !== $cart['restaurant_id'])
        {
            return response([]);
        }

        $cuisines = $cart->cuisines;

        return $this->transform->transformCollection($cuisines, ['restaurant_id'=>$cart['restaurant_id']], true);

    }

    public function addToCart(Request $request, $restaurant_id, $cuisine_id)
    {
        $user = Auth::user();

        $cart = $user->cart;

        $restaurant_id = intVal($restaurant_id);

        if($cart->restaurant_id === null || $cart->restaurant_id === $restaurant_id)
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
