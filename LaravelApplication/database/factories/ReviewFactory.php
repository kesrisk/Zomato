<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use App\User;
App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return Factory(User::class)->create()->id;
        },
        'restaurant_id' => function(){
            return Factory(Restaurant::class)->create()->id;
        },
        'rating' => $faker->numberBetween($min = 0, $max = 5),
        'text' => $faker->paragraph
    ];
});
