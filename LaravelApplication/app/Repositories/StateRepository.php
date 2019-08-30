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
}
