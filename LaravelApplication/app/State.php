<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = ['id'];

    public function addresses(){
        return $this->hasMany(Address:: class);
    }
}
