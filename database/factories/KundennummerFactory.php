<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kundennummer;
use Faker\Generator as Faker;

$factory->define(Kundennummer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'vorname' => $faker->vorname,
        'alias' => $faker->alias,
        'adresse' => $faker->strasse,
        'plz' => $faker->plz,
        'ort' => $faker->ort,
        'tel' => $faker->telefon,
        'kundenconf' => '1',
        'liferantenconf' =>'1',




    ];
});
