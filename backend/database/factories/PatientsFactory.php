<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Patients;
use Faker\Generator as Faker;

$factory->define(Patients::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'gender' => $faker->word,
        'nic' => $faker->word,
        'address' => $faker->word,
        'religion' => $faker->word,
        'user_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
