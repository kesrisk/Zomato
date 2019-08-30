<?php

namespace App\Repositories;

use App\Cuisine;

class CuisineRepository{

    public function findByName($name)
    {
        return Cuisine::where('name', $name)->first();
    }

    public function create($data)
    {
        return Cuisine::create([
            'name'          => $data['name'],
            'description'   => $data['description'],
        ]);
    }
}
