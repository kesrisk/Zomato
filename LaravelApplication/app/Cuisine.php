<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
}
