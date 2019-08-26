<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\District;
use Faker\Generator as Faker;

$factory->define(District::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'state_id' => function(){
            return factory(App\State::class)->create()->id;
        }
    ];
});
