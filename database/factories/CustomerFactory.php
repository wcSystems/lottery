<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'identity_card' => $faker->numberBetween($min = 1000000, $max = 30000000),
        'firstname' => $faker->firstName($gender = 'male'|'female'),
        'lastname' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'created_at'=>now(),
        'updated_at'=>now()
    ];
});
