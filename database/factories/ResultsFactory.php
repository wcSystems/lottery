<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Result;
use Faker\Generator as Faker;

$factory->define(Result::class, function (Faker $faker) {
    return [
        'lottery_id' => $faker->numberBetween($min = 1, $max = 3),
        'schedules_id' => $faker->numberBetween($min = 8, $max = 23),
        'element_win_id' => $faker->numberBetween($min = 13, $max = 50),
        'fecha' => $faker->unique($reset=true)->dateTimeBetween($startDate = '-15 days', $endDate = '-1 days')
    ];
});
