<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admission;
use Faker\Generator as Faker;

$factory->define(Admission::class, function (Faker $faker) {

    return [
        'data' => $faker->word,
        'user_id' => $faker->word,
        'patient_id' => $faker->word,
        'hospital_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
