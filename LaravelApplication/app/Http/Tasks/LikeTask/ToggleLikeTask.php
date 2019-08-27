<?php

namespace App\Http\Tasks\LikeTask;

class ToggleLikeTask{
    public function handle($data)
    {
        $data = [
            'user_id' => $data['user_id'],
            'likeable_id' => $data['id'],
            'likeable_type' => $data['type'],
        ];

        $query=Like::where('user_id', $data['user_id'])->where('likeable_id', $data['likeable_id'])->where('likeable_type', $data['likeable_type']);

        $count = count($query->get());

        if ($count > 0)
        {
            return $query->delete();
        }
        return Like::create($data);
    }
}
