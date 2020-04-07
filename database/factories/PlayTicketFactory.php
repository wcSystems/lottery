<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plays_ticket;
use Faker\Generator as Faker;

$factory->define(Plays_ticket::class, function (Faker $faker) {
    return [
        'play_id' => $faker->numberBetween($min = 1, $max = 200),
        'ticket_id' => $faker->numberBetween($min = 1, $max = 200),
        'bet_element_id' => $faker->numberBetween($min = 13, $max = 50),
        'bet_schedule_id' => $faker->numberBetween($min = 8, $max = 23),
        'created_at'=>now(),
        'updated_at'=>now()
    ];
});
