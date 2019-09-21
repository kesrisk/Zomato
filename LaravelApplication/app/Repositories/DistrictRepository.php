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

    /**
     * find district by name
     *
     * @param district_name $name
     *
     * @return District instance or null
     */
    public function findByName($name)
    {
        return District::where('name', $name)->first();
    }

    /**
     * create district
     *
     * @param data $data
     *
     * @return District instance
     */
    public function create($data)
    {
        return District::create($data);
    }


    /**
     * get District id by name
     *
     * @param District_name $name
     * @param State_id $state_id
     *
     * @return district_id
     */
    public function getId($name, $state_id)
    {

        $district = $this->findByName($name);

        if(!$district)
        {
            return $this->create(['name' => $name, 'state_id' => $state_id])->id;
        }

        return $district['id'];
    }
}
