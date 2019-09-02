<?php

namespace App\Http\Tasks\AttachmentTask;

use App\Traits\AttachmentTrait;

class AddAttachmentTask{

    use AttachmentTrait;

    public function handle($instance, $image_url)
    {
        return $this->createAttachment($instance, $image_url);
    }
}
