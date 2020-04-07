<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [

        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$dJNlL4bv0J5kGxuxMHfE5ezqUqb73yQ7t7fBSZTa2CEifswkmeHy.', // password
        'remember_token' => Str::random(10),
        'firstname' => $faker->firstName($gender = 'male'|'female'),
        'lastname' => $faker->lastName,
        'doc'=> $faker->numberBetween($min = 1000000, $max = 29000000),
        'role_id' => 3,
        'agency_id' => $faker->numberBetween($min = 1, $max = 2),
        'profile' => $faker->imageUrl($width = 100, $height = 100),
        'master' => $faker->numberBetween($min = 6, $max = 10),
        'created_at'=>now(),
        'updated_at'=>now()
    ];
});
