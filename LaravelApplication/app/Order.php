<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

}
