<?php

namespace App\Http\Controllers;

use App\Cuisine;
use App\Restaurant;
use Illuminate\Http\Request;

class CuisineController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $cuisine = Cuisine::where('name', $data['name'])->get();

        $isCuisinePresent = count($cuisine) === 0? false: true;

        if(!$isCuisinePresent)
        {
            $cuisine = Cuisine::createMany([
                'name'          => $data['name'],
                'description'   => $data['description'],
            ]);
        }

        $restaurant = Restaurant::findOrFail($data['restaurant_id']);

        $restaurant->cuisines()->attach([$cuisine[0]['id'] => ['cost' => $data['cost']]]);

        return response('success', 200);
    }
}
