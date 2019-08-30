<?php

namespace App\Traits;

trait AttachmentTrait {

    public function create($object, $image_url)
    {
        return $object->attachments()->create(['image_url' => $image_url]);
    }
}
