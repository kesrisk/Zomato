<?php

namespace App\Http\Tasks\CommentTask;

use App\Repositories\CommentRepository;

class StoreTask{

    private $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($data)
    {
        // handle and store comment in database

        // $data = [
            //     'user_id'           => $request['user_id'],
            //     'commentable_id'    => $request['id'],
            //     'commentable_type'  => $request['type'],
            //     'comment'           => $request['comment'],
            // ];
        $this->repository->create($data);
    }
}
