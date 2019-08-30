<?php

namespace App\Repositories;

use App\District;

class DistrictRepository{


    /**
     * find district
     *
     * @param district_id $id
     *
     * @return District instance
     */
    public function find($id)
    {
        return District::findOrFail($id);
    }
}
