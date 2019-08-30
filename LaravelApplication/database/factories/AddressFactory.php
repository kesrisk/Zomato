<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use App\District;
use App\State;
use Faker\Generator as Faker;
use Illuminate\Foundation\Auth\User;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'state_id' => function(){
            return Factory(State::class)->create()->id;
        },
        'district_id' => function(){
            return Factory(District::class)->create()->id;
        },
        'street' => $faker->streetName,
        'addressable_id' => function() {
            return Factory(User::class)->create()->id;
        },
        'addressable_type' => 'users'
    ];
});
