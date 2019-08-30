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

    public function index($restaurant_id, ShowCartTask $task)
    {
        $data = $task->handle(intval($restaurant_id));

        if($data)
        {
            return $this->transform->transformCollection($data['cuisines'], ['restaurant_id'=>$data['restaurant_id']], true);
        }

        return [];

    }

    public function addToCart(Request $request, $restaurant_id, $cuisine_id, AddToCartTask $task)
    {

        return $task->handle(intval($restaurant_id), $cuisine_id);
    }


}
