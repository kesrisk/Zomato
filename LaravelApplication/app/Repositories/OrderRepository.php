<?php

namespace App\Repositories;

use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderRepository{


    /**
     * find Authenticated User Order
     *
     * @return collection of orders
     */
    public function orders()
    {
        $user = Auth::user();

        return $user->orders;
    }


    /**
     * find order
     *
     * @param order_id $id
     *
     * @return order instance
     */
    public function find($id)
    {
        return Order::findOrFail($id);
    }


    /**
     * create order of authenticated user
     *
     * @param create_order data
     *
     * @return order instance
     */
    public function create($data)
    {
        $user = Auth::user();

        return $user->orders()->create($data);
    }


    /**
     * add cuisines to order
     *
     * @param App\Order $order
     * @param cuisine_id $id
     * @param int $quantity
     * @param int $cost
     *
     * @return attachment instance
     */
    public function addCuisine($order, $id, $quantity, $cost)
    {

        return $order->cuisines()->attach([$id => ['cost' => $cost, 'quantity' => $quantity]]);
    }

}
