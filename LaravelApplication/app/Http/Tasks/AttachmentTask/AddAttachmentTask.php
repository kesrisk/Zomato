<?php

namespace App\Http\Tasks\AttachmentTask;

use App\Traits\AddressTrait;

class AddAttachmentTask{

    use AddressTrait;

    public function handle($instance, $image_url)
    {
        return $this->createAddress($instance, $image_url);
    }
}
