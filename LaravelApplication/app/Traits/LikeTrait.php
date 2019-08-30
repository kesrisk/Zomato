<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait LikeTrait{

    public function like($object)
    {
        $query = $object->likes->where('user_id', Auth::user()->id)->first();

        if($query)
        {
            return $query->delete();
        }

        return $object->likes->create('user_id', Auth::user()->id);
    }
}
