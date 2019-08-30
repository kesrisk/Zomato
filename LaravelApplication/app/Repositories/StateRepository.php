<?php

namespace App\Repositories;

use App\State;

class StateRepository{

    public function find($id)
    {
        return State::findOrFail($id);
    }
}
