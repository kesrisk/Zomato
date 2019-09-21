<?php

namespace App\Transformers;

use App\Cart;
use App\Cuisine;
use Illuminate\Support\Facades\DB;

class CartTransformer extends ApiTransformer{

    public function transform(Cuisine $item, array $relations, $includeExtras){

        $cost = DB::table('cuisine_restaurant')->where('cuisine_id', $item['id'])->where('restaurant_id', $relations['restaurant_id'])->get()[0]->cost;

        return [
            'id'            => $item['id'],
            'name'          => $item['name'],
            'description'   => $item['description'],
            'quantity'      => $item->pivot['quantity'],
            'cost'          => $cost,
        ];
    }
}
