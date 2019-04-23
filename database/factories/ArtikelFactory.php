<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Artikel;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(Artikel::class, function (Faker $faker) {
    return [
        "judul" => ucwords($faker->text(25)),
        "deskripsi" => $faker->text(),
        "isi" => $faker->realText(1000)
    ];
});

$factory->afterCreating(Artikel::class, function (Artikel $artikel, Faker $faker) {
    $artikel->addMedia(UploadedFile::fake()->image($artikel->id))
        ->toMediaCollection(Artikel::GAMBAR_UTAMA_IMAGE);
});
