<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{

    protected $guarded = ['id'];


    public function attachable()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }
}
