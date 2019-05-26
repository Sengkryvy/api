<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'detail' => $faker->sentence,
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(0, 50),
        'image' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
