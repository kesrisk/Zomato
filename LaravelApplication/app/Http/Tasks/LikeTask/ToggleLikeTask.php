<?php

namespace App\Http\Tasks\LikeTask;

use App\Traits\LikeTrait;

class ToggleLikeTask{

    use LikeTrait;

    public function handle($instance)
    {
        return $this->like($instance);
    }
}
