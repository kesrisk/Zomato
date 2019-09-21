<?php

namespace App\Transformers;

use App\Cuisine;
use App\State;

class RestaurantTransformer extends ApiTransformer
{

    public function transform(Cuisine $item, array $relations = [], $includeExtras = false)
    {
        return [
            'id'            => $item['id'],
            'name'          => $item['name'],
            'description'   => $item['description'],
            'cost'          => $item['pivot']->cost,
        ];
    }

}
