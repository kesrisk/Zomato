<?php

namespace App\Http\Controllers;

use App\Http\Tasks\AttachmentTask\AddAttachmentTask;
use App\Repositories\RestaurantRepository;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;


class AttachmentController extends Controller
{
    private $restaurantRepository;
    private $reviewRepository;
    private $addAttachmentTask;
    public function __construct(RestaurantRepository $restaurantRepository, ReviewRepository $reviewRepository, AddAttachmentTask $addAttachmentTask)
    {
        $this->restaurantRepository = $restaurantRepository;
        $this->reviewRepository     = $reviewRepository;
        $this->addAttachmentTask    = $addAttachmentTask;
    }

    public function store(Request $request, $type, $id)
    {
        switch($type)
        {
            case "reviews":
                return $this->addAttachmentTask->handle($this->reviewRepository->find($id), $request['image_url']);

            case "restaurants":
                return $this->addAttachmentTask->handle($this->restaurantRepository->find($id), $request['image_url']);

            default:
                return response('Incorrect Route', 403);
        }
    }


    /** SHIFTED TO LIKECONTROLLER AND COMMENT CONTROLLER */

    // private $repository;

    // public function __construct(AttachmentRepository $repository)
    // {
    //     $this->repository = $repository;
    // }


    // /**
    //  * get all likes associated with attachment
    //  *
    //  * @param $id as attachment_id
    //  *
    //  * @return response of all likes associated with attachment
    //  */
    // public function likes($id)
    // {
    //     return $this->repository->likes($id);
    // }


    // /**
    //  * get all comments associated with attachment
    //  *
    //  * @param $id as attachment_id
    //  *
    //  * @return response of all comment associated with attachment
    //  */
    // public function comments($id)
    // {
    //     return $this->repository->comments($id);
    // }


    // /**
    //  * like/dislike an attachment
    //  *
    //  * @param attachmant_id
    //  * @param App\Http\Tasks\LikeTask\ToggleLikeTask $task
    //  *
    //  * @return response 'success' and status code 200
    //  */
    // public function toggleLike($id, ToggleLikeTask $task)
    // {
    //     return $task->handle($this->repository->find($id));
    // }


    // /**
    //  * add coment to an attachment
    //  *
    //  * @param attachmant_id
    //  * @param App\Http\Tasks\CommentTask\StoreCommentTask $task
    //  * @param App\Http\Requests\CreateCommentRequest $request
    //  *
    //  * @return response 'success' and status code 200
    //  */
    // public function addComment(CreateCommentRequest $request, $id, StoreCommentTask $task)
    // {
    //     return $task->handle($this->repository->find($id), $request['comment']);
    // }

}
