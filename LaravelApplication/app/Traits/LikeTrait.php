<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait LikeTrait{

    public function like($object)
    {
        // dd($object);

        $query = $object->likes->where('user_id', Auth::user()->id)->first();

        if($query)
        {
            $query->delete();

            return response('success', 200);
        }

        $object->likes()->create(['user_id' => Auth::user()->id]);

        return response('success', 200);
    }
}
