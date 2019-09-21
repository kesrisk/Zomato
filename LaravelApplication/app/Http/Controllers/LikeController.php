<?php

namespace App\Http\Controllers;

use App\Http\Tasks\LikeTask\ToggleLikeTask;
use App\Repositories\AttachmentRepository;
use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    private $reviewRepository;
    private $attachmentRepository;
    private $task;

    public function  __construct(ReviewRepository $reviewRepository, AttachmentRepository $attachmentRepository)
    {
        $this->reviewRepository = $reviewRepository;
        $this->task = new ToggleLikeTask();
        $this->attachmentRepository = $attachmentRepository;
    }


    /**
     *store cuisine

     * @param model_type $type
     * @param model_id $id
     *
     * @return response 'success' with status code
     */
    public function toggleLike($type, $id)
    {
        switch($type) {
            case "reviews":
                return $this->task->handle($this->reviewRepository->find($id));

            case "attachments":
                return $this->task->handle($this->attachmentRepository->find($id));

            default:
                return response('Incorrect Route', 403);
        }
    }


    /**
     *store cuisine

     * @param model_type $type
     * @param model_id $id
     *
     * @return response 'success' with status code
     */
    public function allLikes($type, $id)
    {
        switch($type) {
            case "reviews":
                return $this->reviewRepository->likes($id);

            case "attachments":
                return $this->attachmentRepository->likes($id);

            default:
                return response('Incorrect Route', 403);
        }
    }
}
