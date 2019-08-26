<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;
use App\User;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return Factory(User::class)->create()->id;
        },
        'likeable_id' => function() {
            return Factory(\App\Review:: class)->create()->id;
        },
        'likeable_type' => 'App\Review',
    ];
});
