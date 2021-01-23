<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$gender = ['male', 'female'];

$factory->define(User::class, function (Faker $faker) use ($gender) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('123456'),
        'gender' => $gender[rand(0, 1)],
        'country_id' => rand(1, 240),
        'education' => $faker->word,
        'religion_id' => rand(1, 2),
        'phone' => $faker->phoneNumber,
        'photo' => $faker->imageUrl(),
        'cover' => $faker->imageUrl(),
        'dob' => $faker->date(),
        'bio' => $faker->paragraph,
        'is_complete' => 1,
        'is_init' => 1,
        'remember_token' => Str::random(10),
    ];
});
