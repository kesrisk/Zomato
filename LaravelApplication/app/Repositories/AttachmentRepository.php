<?php

namespace App\Repositories;

use App\Attachment;

class AttachmentRepository{


    /**
     * find attachment
     *
     * @param attachment_id $id
     *
     * @return attachment instance
     */
    public function find($id)
    {

        return Attachment::findOrFail($id);
    }

    /**
     * get attachment likes
     *
     * @param attachment_id $id
     *
     * @return collection of likes
     */
    public function likes($id)
    {

        return $this->find($id)->likes;
    }


    /**
     * get attachment comments
     *
     * @param attachment_id $id
     *
     * @return collection of comments
     */
    public function comments($id)
    {

        return $this->find($id)->comments;
    }
}
