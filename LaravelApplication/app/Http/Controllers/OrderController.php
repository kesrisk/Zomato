<?php

namespace App\Http\Controllers;

use App\Promocode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{



    public function placeOrder(Request $request, $restaurant_id)
    {

        $GLOBALS['total'] = 0;

        $user = Auth::user();

        $cart = $user->cart;

        $restaurant_id = intval($restaurant_id);


        // if current restaurnt and cart restuarant are not same the return
        if ($cart['restaurant_id'] !== $restaurant_id)
        {
            return response('Unauthorize to buy these products', 401);
        }

        $cuisines = $cart->cuisines;


        $cuisines = $cuisines->map(function($cuisine) use ($restaurant_id){

            $cost = DB::table('cuisine_restaurant')->where('cuisine_id', $cuisine['id'])->where('restaurant_id', $restaurant_id)->get()[0]->cost;

            $GLOBALS['total'] += $cost;

            return [
                'cuisine_id'    => $cuisine['id'],
                'quantity'      => $cuisine->pivot['quantity'],
                'cost'          => $cost,

            ];
        });

        $discount = 0;

        if($request['promocode_id'] !== null)
        {
            $promocode = Promocode::findOrFail($request['promocode_id']);
            $discount = $promocode['discount'];
        }

        $final_total = $GLOBALS['total'] - $GLOBALS['total'] * $discount / 100;



        $orderDetails = [
            'address_id'        => $request['address_id'],
            'promocode_id'        => $request['promocode_id'],
            'total'             => $GLOBALS['total'],
            'final_total'       => $final_total
        ];

        // return $orderDetails;

        $order = $user->orders()->create($orderDetails);

        // return $cuisines;

        foreach($cuisines as $cuisine)
        {
            $order->cuisines()->attach([$cuisine['cuisine_id'] => ['quantity' => $cuisine['quantity'], 'cost' => $cuisine['cost']]]);
        }


        return response('success', 200);
    }
}
