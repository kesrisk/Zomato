<?php

namespace App\Http\Tasks\OrderTask;

use App\Cuisine;
use App\Repositories\CartRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PromocodeRepository;
use App\Repositories\RestaurantRepository;



class CreateOrderTask{

    private $cartRepository;
    private $promocodeRepository;
    private $orderRepository;
    private $restaurantRepository;

    public function __construct(CartRepository $cartRepository, PromocodeRepository $promocodeRepository, OrderRepository $orderRepository, RestaurantRepository $restaurantRepository)
    {
        $this->cartRepository       = $cartRepository;

        $this->promocodeRepository  = $promocodeRepository;

        $this->orderRepository      = $orderRepository;

        $this->restaurantRepository = $restaurantRepository;
    }



    public function transformCuisines($cuisines, $restaurant_id)
    {
        return $cuisines->map(function($cuisine) use ($restaurant_id){

            $cost = $this->restaurantRepository->cusineCost($restaurant_id, $cuisine['id']);

            $GLOBALS['total'] += $cost * $cuisine->pivot['quantity'];

            return [
                'cuisine_id'    => $cuisine['id'],
                'name'          => $cuisine['name'],
                'quantity'      => $cuisine->pivot['quantity'],
                'cost'          => $cost,
            ];
        });
    }

    public function discount($promocode_id)
    {
        $discountPercent = 0;
        $maxDiscount = 0;

        if($promocode_id !== null)
        {
            $promocode_id = $this->promocodeRepository->find($promocode_id);

            $discountPercent = $promocode_id['discount'];

            $maxDiscount = $promocode_id['maximum_discount'];
        }

        $discount = $GLOBALS['total'] * $discountPercent / 100;

        return $discount < $maxDiscount? $discount : $maxDiscount;

    }


    public function create($data, $final_total)
    {
        $orderDetails = [
            'address_id'        => $data['address_id'],
            'promocode_id'        => $data['promocode_id'],
            'total'             => $GLOBALS['total'],
            'final_total'       => $final_total
        ];

        return $this->orderRepository->create($orderDetails);

    }


    public function addCuisines($order, $cuisines)
    {
        foreach($cuisines as $cuisine)
        {
            $this->orderRepository->addCuisine($order, $cuisine['cuisine_id'], $cuisine['quantity'], $cuisine['cost']);
        }
    }


    public function handle($data)
    {
        $restaurant_id = intval($data['restaurant_id']);

        $GLOBALS['total'] = 0;

        $cart = $this->cartRepository->userCart();


        if ($cart['restaurant_id'] !== $restaurant_id)
        {
            return response('Unauthorize to buy these products', 401);
        }

        $cuisines = $this->cartRepository->cuisines($cart);

        if(count($cuisines) == 0)
        {
            return response('cart is empty', 200);
        }

        $cuisines = $this->transformCuisines($cuisines, $restaurant_id);

        $discount = $data['promocode_id']? $this->discount($data['promocode_id']): 0;

        $final_total = $GLOBALS['total'] - $discount;

        $order = $this->create($data, $final_total);

        $this->addCuisines($order, $cuisines);

        $cart->clear();

        return ['orders' => $order, 'cuisines' => $cuisines];
    }
}
