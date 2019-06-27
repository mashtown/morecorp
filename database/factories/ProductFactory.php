<?php

use Faker\Generator as Faker;
use App\User;


$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'user_id' => getInstanceOf(User::class),
        'name' => $faker->name,
        'sku' => $faker->ean8,
        'price' => $faker->randomNumber(2),
        'description' => $faker->text(200)
    ];
});

function getInstanceOf($class, $returnIdOnly = true) {
    $instance = $class::inRandomOrder()->first() ?? factory($class)->create();
    return $returnIdOnly ? $instance->id : $instance;
}
