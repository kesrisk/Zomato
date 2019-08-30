<?php

namespace App\Http\Tasks\CuisineTask;

use App\Cuisine;
use App\Repositories\CuisineRepository;
use App\Repositories\RestaurantRepository;
use App\Restaurant;

class CreateCuisineTask{

    private $cuisineRepository;
    private $restaurantRepository;

    public function __construct(CuisineRepository $cuisineRepository, RestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
        $this->cuisineRepository = $cuisineRepository;
    }

    public function handle($data)
    {
        $cuisine = $this->cuisineRepository->findByName($data['name']);

        if(!$cuisine)
        {
            $cuisine = $this->cuisineRepository->create($data);
        }

        $restaurant = $this->restaurantRepository->find($data['restaurant_id']);

        return $this->restaurantRepository->addCuisine($restaurant, $cuisine['id'], $data['cost']);
    }
}
