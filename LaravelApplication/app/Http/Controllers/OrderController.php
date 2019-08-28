<?php

namespace App\Http\Controllers;

use App\Order;
use App\Promocode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $orders = $user->orders;

        return $orders;
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        $cuisines = $order->cuisines;

        return $cuisines;
    }


    public function store(Request $request, $restaurant_id)
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

        if (count($cuisines) === 0)
        {
            return response('cart is empty', 200);
        }


        $cuisines = $cuisines->map(function($cuisine) use ($restaurant_id){

            $cost = DB::table('cuisine_restaurant')->where('cuisine_id', $cuisine['id'])->where('restaurant_id', $restaurant_id)->get()[0]->cost;

            $GLOBALS['total'] += $cost * $cuisine->pivot['quantity'];

            return [
                'cuisine_id'    => $cuisine['id'],
                'quantity'      => $cuisine->pivot['quantity'],
                'cost'          => $cost,

            ];
        });

        $discountPercent = 0;
        $maxDiscount = 0;

        if($request['promocode_id'] !== null)
        {
            $promocode = Promocode::findOrFail($request['promocode_id']);
            $discountPercent = $promocode['discount'];
            $maxDiscount = $promocode['maximum_discount'];
        }

        $discount = $GLOBALS['total'] * $discountPercent / 100;

        $discount = $discount < $maxDiscount? $discount : $maxDiscount;

        $final_total = $GLOBALS['total'] - $discount;



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

        $cart->clear();

        return response('success', 200);
    }
}
