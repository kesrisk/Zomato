<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreateCommentRequest;
use App\Http\Tasks\CommentTask\StoreCommentTask;
use App\Http\Tasks\CommentTask\StoreTask;
use App\Repositories\AttachmentRepository;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    private $reviewRepository;
    private $attachmentRepository;
    private $task;

    public function  __construct(ReviewRepository $reviewRepository, AttachmentRepository $attachmentRepository)
    {
        $this->reviewRepository = $reviewRepository;
        $this->task = new StoreCommentTask();
        $this->attachmentRepository = $attachmentRepository;
    }

    /**
     *store comments
     *
     * @param type of model, $request and model_id
     *
     * @return response 'success' with status code
     */
    public function store(Request $request, $type, $id)
    {
        switch($type)
        {
            case "reviews":
                return $this->task->handle($this->reviewRepository->find($id), $request['comment']);

            case "attachments":
                return $this->task->handle($this->attachmentRepository->find($id), $request['comment']);

            default:
                return response('Incorrect Route', 403);
        }
    }


    /**
     * add cuisines to cart
     *
     * @param type of model
     * @param model_id
     *
     * @return collection of comments.
     */
    public function allComments($type, $id)
    {
        switch($type)
        {
            case "reviews":
                return $this->reviewRepository->comments($id);

            case "attachments":
                return $this->attachmentRepository->comments($id);

            default:
                return response('Incorrect Route', 403);
        }
    }

}
