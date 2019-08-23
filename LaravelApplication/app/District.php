<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function addresses(){
        return $this->hasMany(Address:: class);
    }
}
