<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->numerify('000########'),
        'datetime' => now(),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'ticket_office_id' => $faker->numberBetween($min = 1, $max = 5),
        'customer_id' => $faker->numberBetween($min = 1, $max = 200),
        'created_at'=>now(),
        'updated_at'=>now()
    ];
});
