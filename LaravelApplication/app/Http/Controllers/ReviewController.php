<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Tasks\AttachmentTask\AddAttachmentTask;
use App\Http\Tasks\CommentTask\StoreCommentTask;
use App\Http\Tasks\LikeTask\ToggleLikeTask;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public $repository;

    public function __construct(ReviewRepository $repository)
    {

        $this->repository = $repository;
    }


    /**
     * get comment of review
     *
     * @param review_id $id
     *
     * @return collection of comments
     */
    public function comments($id)
    {

        return $this->repository->comments($id);
    }

    /**
     * add attachment to the restaurant
     *
     * @param review_id $id
     *
     * @return collection of likes
     */
    public function likes($id)
    {

        return $this->repository->likes($id);
    }


    /**
     * add attachment to the review
     *
     * @param Illuminate\Http\Request $request
     * @param review_id $id
     * @param App\Http\Tasks\AttachmentTask\AddAttachmentTask $task
     *
     * @return response 'success' and response code
     */
    public function addAttachments(Request $request, $id, AddAttachmentTask $task)
    {
        $task->handle($this->repository->find($id), $request['image_url']);

        return response('success', 200);
    }

    /**
     * add comment to the review
     *
     * @param App\Http\Requests\CreateCommentRequest $request
     * @param review_id $id
     * @param App\Http\Tasks\AttachmentTask\AddAttachmentTask $task
     *
     * @return response 'success' and response code
     */
    public function addComment(CreateCommentRequest $request, $id, StoreCommentTask $task)
    {
        $task->handle($this->repository->find($id), $request['comment']);

        return response('success', 200);
    }


    /**
     * toggle likes of review
     *
     * @param review_id $id
     * @param App\Http\Tasks\LikeTask\ToggleLikeTask $task
     *
     * @return response 'success' and response code
     */
    public function toggleLike($id, ToggleLikeTask $task)
    {

        $task->handle($this->repository->find($id));

        return response('success', 200);
    }
}
