<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'state_id' => function(){
            return Factory(\App\State::class)->create()->id;
        },
        'district_id' => function(){
            return Factory(\App\District::class)->create()->id;
        },
        'street' => $faker->streetName,
        'addressable_id' => function() {
            return Factory(\App\User::class)->create()->id;
        },
        'addressable_type' => 'App\User'
    ];
});
