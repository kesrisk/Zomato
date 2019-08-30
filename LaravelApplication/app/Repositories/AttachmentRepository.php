<?php

namespace App\Repositories;

use App\Attachment;

class AttachmentRepository{

    public function find($id)
    {
        return Attachment::findOrFail($id);
    }

    public function likes($id)
    {
        return $this->find($id)->likes;
    }

    public function comments($id)
    {
        return $this->find($id)->comments;
    }
}
