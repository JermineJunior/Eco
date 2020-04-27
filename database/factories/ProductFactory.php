<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title'         =>  $faker->word(),
        'description'   =>  $faker->sentence(4),
        'price'         =>  $faker->randomFloat(),
        'in_stock'      =>  $faker->numberBetween(0.12),
    ];
});
