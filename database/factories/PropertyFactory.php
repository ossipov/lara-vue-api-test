<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'name' => "The ".$faker->unique(true)->firstName(),
        'price' => $faker->numberBetween(315684,978123),
        'bedrooms' => $faker->numberBetween(1,5),
        'bathrooms' => $faker->numberBetween(1,3),
        'storeys' => $faker->numberBetween(0,2),
        'garages' => $faker->numberBetween(0,2),
    ];
});
