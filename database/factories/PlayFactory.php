<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Play;
use Faker\Generator as Faker;
use phpDocumentor\Reflection\Types\Integer;

$factory->define(Play::class, function (Faker $faker) {
    return [
        'lottery_id' => $faker->numberBetween($min = 1, $max = 3),
        'bet_value_id' => $faker->numberBetween($min = 1, $max = 200),
        'date' => $faker->dateTimeBetween($startDate = '-7 days', $endDate = 'now', $timezone = null),
        'created_at'=>now(),
        'updated_at'=>now()
    ];
});
