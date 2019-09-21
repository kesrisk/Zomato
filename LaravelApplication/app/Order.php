<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class)->withPivot(['quantity', 'cost']);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function promocode()
    {
        return $this->belongsTo(Promocode::class);
    }


}
