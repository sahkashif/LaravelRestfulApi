<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\dummy::class, function (Faker $faker) {
    return [
        "context" => $faker->text(20),
        "body" => $faker->text(120)
    ];
});
