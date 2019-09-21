<?php

namespace App\Repositories;

use App\Cuisine;

class CuisineRepository{


    /**
     * find cuisine by name
     *
     * @param cuisine $name
     *
     * @return cuisine object
     */
    public function findByName($name)
    {
        return Cuisine::where('name', $name)->first();
    }


    /**
     * create cuisine
     *
     * @param $request data
     *
     * @return cuisine instance
     */
    public function create($data)
    {
        return Cuisine::create([
            'name'          => $data['name'],
            'description'   => $data['description'],
        ]);
    }
}
