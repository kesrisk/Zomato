<?php

namespace App\Repositories;

use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderRepository{

    public function orders()
    {
        $user = Auth::user();

        return $user->orders;
    }

    public function find($id)
    {
        return Order::findOrFail($id);
    }


    public function create($data)
    {
        $user = Auth::user();

        return $user->orders()->create($data);
    }

    public function addCuisine($order, $id, $quantity, $cost)
    {

        return $order->cuisines()->attach([$id => ['cost' => $cost, 'quantity' => $quantity]]);
    }

}
