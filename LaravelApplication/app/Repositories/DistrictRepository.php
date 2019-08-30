<?php

namespace App\Repositories;

use App\District;

class DistrictRepository{

    public function find($id)
    {
        return District::findOrFail($id);
    }
}
