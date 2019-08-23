<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attachment;
use App\Review;
use Faker\Generator as Faker;

$factory->define(Attachment::class, function (Faker $faker) {
    return [
        'image_url' => 'https://images-platform.99static.com/9VnLZVJjXMdwbbFHEbzKQCgmQvY=/3x3:2000x2000/500x500/top/smart/99designs-contests-attachments/83/83179/attachment_83179164',
        'attachable_id' => function(){
            return factory(Review::class)->create()->id;
        },
        'attachable_type' => 'App\Review',
    ];
});
