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
        return $this->belongsTo(Address:: class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, ['category' => 'Restaurant', 'related_id' => $this->id]);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
