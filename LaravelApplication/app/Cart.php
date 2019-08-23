<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
