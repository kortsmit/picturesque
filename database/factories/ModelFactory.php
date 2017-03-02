<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Picturesque\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Picturesque\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(4),
        'slug' => $faker->slug($faker->numberBetween(1, 2)),
        'color' => $faker->hexColor,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Picturesque\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'category_id' => 1,
        'title' => $faker->sentence(10, true),
        'slug' => $faker->slug,
        'description' => $faker->realText($faker->numberBetween(100, 200)),
        'text' => $faker->realText($faker->numberBetween(250, 500)),
        'published' => 1,
    ];
});