<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promocode;
use Faker\Generator as Faker;

$factory->define(Promocode::class, function (Faker $faker) {
    return [
        'code' => $faker->word,
        'discount' => $faker->numberBetween($min = 0, $max = 100),
        'maximum_discount' => 150,
    ];
});
