<?php

namespace App\Repositories;

use App\Promocode;

class PromocodeRepository{



    /**
     * find promocode
     *
     * @param promocode_id $id
     *
     * @return Promocode
     */
    public function find($id)
    {
        return Promocode::findOrFail($id);
    }


    /**
     * find promocode by name
     *
     * @param promocode_name $name
     *
     * @return prmocode
     */
    public function findByName($name)
    {
        return Promocode::where('code', $name)->first();
    }
}
