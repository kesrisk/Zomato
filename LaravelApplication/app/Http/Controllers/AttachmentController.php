<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Http\Requests\CreateCommentRequest;
use App\Like;
use App\Repositories\AttachmentRepository;
use App\Traits\LikeTrait;
use App\Traits\CommentTrait;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{

    use CommentTrait, LikeTrait;

    private $repository;

    public function __construct(AttachmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function likes($id)
    {
        return $this->repository->likes($id);
    }

    public function comments($id)
    {
        return $this->repository->comments($id);
    }

    public function toggleLike($id)
    {
        return $this->like($this->repository->find($id));
    }

    public function addComments(CreateCommentRequest $request, $id)
    {
        return $this->create($this->repository->find($id), $request['comment']);
    }

}
