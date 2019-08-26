<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Middleware\ThrottleRequestsWithRedis;

class Review extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function attachment()
    {
        return $this->morphMany(Attachment:: class, 'attachable');
    }
}


