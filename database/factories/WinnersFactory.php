<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Winner;
use Faker\Generator as Faker;

$factory->define(Winner::class, function (Faker $faker) {
    return [
        'result_id' => $faker->numberBetween($min = 1, $max = 15),
        'ticket_id' => $faker->numberBetween($min = 1, $max = 100)
    ];
});
