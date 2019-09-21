<?php

namespace App\Repositories;

use App\State;

class StateRepository{


    /**
     * find State
     *
     * @param state_id $id
     *
     * @return State instance
     */
    public function find($id)
    {
        return State::findOrFail($id);
    }

    /**
     * find State by name
     *
     * @param state_name $name
     *
     * @return State instance or null
     */
    public function findByName($name)
    {
        return State::where('name', $name)->first();
    }

    /**
     * create State
     *
     * @param state_name $name
     *
     * @return State instance
     */
    public function create($name)
    {
        return State::create(['name' => $name]);
    }

    /**
     * get district_id by name
     *
     * @param state_name $name
     *
     * @return State_id
     */
    public function getId($name)
    {
        $state = $this->findByName($name);

        if(!$state)
        {
            return $this->create($name)->id;
        }

        return $state['id'];
    }
}
