<?php

namespace App\Repositories;

use App\Restaurant;
use App\Traits\SaveAttachmentTrait;
use Illuminate\Support\Facades\Auth;

class RestaurantRepository{


    /**
     * find Restaurant
     *
     * @param restaurant_id $id
     *
     * @return restaurant instance
     */
    public function find($id)
    {
        return Restaurant::findOrFail($id);
    }

    /**
     * get all Restaurant
     *
     * @param restaurant_id $id
     *
     * @return collection of restaurants
     */
    public function all()
    {
        return Restaurant::all();
    }


    /**
     * add cuisines to restaurants
     *
     * @param restaurant_id $id
     *
     * @return cuisine instance
     */
    public function addCuisine($restaurant, $id, $cost)
    {
        return $restaurant->cuisines()->attach([$id => ['cost' => $cost]]);
    }


    /**
     * find Restaurant
     *
     * @param restaurant_id $id
     *
     * @return collection of cuisines
     */
    public function cuisines($id)
    {
        return $this->find($id)->cuisines;
    }


    /**
     * get cuisines cost
     *
     * @param restaurant_id $restaurant_id
     * @param cuisine_id $cuisine_id
     *
     * @return int $cost
     */
    public function cusineCost($restuarant_id, $cuisine_id)
    {

        return $this->cuisines($restuarant_id)->find($cuisine_id)->pivot->cost;
    }


    /**
     * add review to restaurant
     *
     * @param restaurant_id $id
     *
     * @return review instance
     */
    public function addReview($id, $data)
    {

        return $this->find($id)->reviews()->create($data + ['user_id' => Auth::user()->id]);
    }


    /**
     * get restaurant address
     *
     * @param restaurant_id $id
     *
     * @return address instance
     */
    public function address($id)
    {

        return $this->find($id)->address;
    }


    /**
     * get Restaurant attachments
     *
     * @param restaurant_id $id
     *
     * @return collection of attachments
     */
    public function attachments($id)
    {

        return $this->find($id)->attachments;
    }


}
