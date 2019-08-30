<?php

namespace App\Repositories;

use App\Restaurant;
use App\Traits\SaveAttachmentTrait;

class RestaurantRepository{


    public function find($id)
    {
        return Restaurant::findOrFail($id);
    }

    public function all()
    {
        return Restaurant::all();
    }

    public function addCuisine($restaurant, $id, $cost)
    {
        return $restaurant->cuisines()->attach([$id => ['cost' => $cost]]);
    }

    public function cuisines($id)
    {
        return $this->find($id)->cuisines;
    }

    public function cusineCost($restuarant_id, $cuisine_id)
    {

        return $this->cuisines($restuarant_id)->find($cuisine_id)->pivot->cost;
    }

    public function addReview($id, $data)
    {

        return $this->find($id)->reviews()->create($data);
    }

    public function address($id)
    {

        return $this->find($id)->address;
    }

    public function attachments($id)
    {

        return $this->find($id)->attachments;
    }


}
