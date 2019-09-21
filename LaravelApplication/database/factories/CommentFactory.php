<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return Factory(User::class)->create()->id;
        },
        'commentable_id' => function() {
            return Factory(\App\Review:: class)->create()->id;
        },
        'commentable_type' => 'reviews',
        'comment' => $faker->paragraph,
    ];
});
