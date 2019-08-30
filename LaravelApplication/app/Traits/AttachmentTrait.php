<?php

namespace App\Traits;

trait AttachmentTrait {

    public function createAttachment($object, $image_url)
    {
        return $object->attachments()->create(['image_url' => $image_url]);
    }
}
