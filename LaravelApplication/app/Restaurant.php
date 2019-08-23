<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class)->withPivot('cost');
    }

    public function address()
    {
        return $this->morphOne(Address:: class, 'addressable');
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
