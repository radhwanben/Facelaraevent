<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Group;
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

$factory->define(App\Group::class, function (Faker $faker) {
    return [
          'group'       => $faker->word,
          'contact_name'=> $faker->word,
          'address'     => $faker->word,
          'post_code'   => $faker->word,
          'city'        => $faker->word,
          'email'       => $faker->unique()->safeEmail,
          ];
      });
