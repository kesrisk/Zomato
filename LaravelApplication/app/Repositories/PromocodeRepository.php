<?php

namespace App\Repositories;

use App\Promocode;

class PromocodeRepository{


    public function find($id)
    {
        return Promocode::findOrFail($id);
    }

    public function findByName($name)
    {
        return Promocode::where('code', $name)->first();
    }
}
