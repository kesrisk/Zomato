<?php

namespace App\Http\Controllers;

use App\Http\Tasks\CartTask\AddToCartTask;
use App\Http\Tasks\CartTask\ShowCartTask;
use Illuminate\Http\Request;
use App\Transformers\CartTransformer;

class CartController extends Controller
{
    private $transform;

    public function __construct(CartTransformer $transform){

        $this->transform = $transform;
    }


    /**
     * get cart cuisines
     *
     * @param restaurant_id
     * @param App\Http\Tasks\CartTask\ShowCartTask $task
     *
     * @return collection of all the cuisines present in cart
     */
    public function index($restaurant_id, ShowCartTask $task)
    {
        $data = $task->handle(intval($restaurant_id));

        if($data)
        {
            return $this->transform->transformCollection($data['cuisines'], ['restaurant_id'=>$data['restaurant_id']], true);
        }

        return [];
    }

    /**
     * add cuisines to cart
     *
     * @param restaurant_id
     * @param cuisine_id
     * @param App\Http\Tasks\CartTask\AddToCartTask $task
     *
     * @return response 'success' and status code 200
     */
    public function addToCart(Request $request, $restaurant_id, $cuisine_id, AddToCartTask $task)
    {

        return $task->handle(intval($restaurant_id), $cuisine_id);
    }


}
