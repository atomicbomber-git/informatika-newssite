<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Artikel;
use Faker\Generator as Faker;

$factory->define(Artikel::class, function (Faker $faker) {
    return [
        "judul" => ucwords($faker->text(25)),
        "isi" => $faker->realText(1000)
    ];
});
