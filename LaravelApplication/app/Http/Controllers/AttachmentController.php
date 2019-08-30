<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Tasks\CommentTask\StoreCommentTask;
use App\Http\Tasks\LikeTask\ToggleLikeTask;
use App\Repositories\AttachmentRepository;

class AttachmentController extends Controller
{


    private $repository;

    public function __construct(AttachmentRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * get all likes associated with attachment
     *
     * @param $id as attachment_id
     *
     * @return response of all likes associated with attachment
     */
    public function likes($id)
    {
        return $this->repository->likes($id);
    }


    /**
     * get all comments associated with attachment
     *
     * @param $id as attachment_id
     *
     * @return response of all comment associated with attachment
     */
    public function comments($id)
    {
        return $this->repository->comments($id);
    }


    /**
     * like/dislike an attachment
     *
     * @param attachmant_id
     * @param App\Http\Tasks\LikeTask\ToggleLikeTask $task
     *
     * @return response 'success' and status code 200
     */
    public function toggleLike($id, ToggleLikeTask $task)
    {
        return $task->handle($this->repository->find($id));
    }


    /**
     * add coment to an attachment
     *
     * @param attachmant_id
     * @param App\Http\Tasks\CommentTask\StoreCommentTask $task
     * @param App\Http\Requests\CreateCommentRequest $request
     *
     * @return response 'success' and status code 200
     */
    public function addComment(CreateCommentRequest $request, $id, StoreCommentTask $task)
    {
        return $task->handle($this->repository->find($id), $request['comment']);
    }

}
