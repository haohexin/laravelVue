<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->sentence,
    ];
});
