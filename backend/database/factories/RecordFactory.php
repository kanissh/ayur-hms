<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Record;
use Faker\Generator as Faker;

$factory->define(Record::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'patient_id' => $faker->word,
        'hospital_id' => $faker->word,
        'data' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
