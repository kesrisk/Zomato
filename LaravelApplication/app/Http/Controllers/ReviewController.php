<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Repositories\ReviewRepository;
use App\Traits\AttachmentTrait;
use App\Traits\CommentTrait;
use App\Traits\LikeTrait;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    use AttachmentTrait, CommentTrait, LikeTrait;

    public $repository;

    public function __construct(ReviewRepository $repository)
    {

        $this->repository = $repository;
    }

    public function comments($id)
    {

        return $this->repository->comments($id);
    }

    public function likes($id)
    {

        return $this->repository->likes($id);
    }

    public function addAttachments(Request $request, $id)
    {
        return $this->create($this->repository->find($id), $request['image_url']);
    }

    public function addComments(CreateCommentRequest $request, $id)
    {
        return $this->create($this->repository->find($id), $request['comment']);
    }

    public function toggleLike($id)
    {
        return $this->like($this->repository->find($id));
    }
}
