<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
  $path = storage_path('app/public/products');
    return [
      'name' => $faker->sentence(3),
      'description' => $faker->sentence(20),
      'price'=> $faker->randomFloat(2, 300, 4000),
      'categorie_id'=>$faker->numberBetween(1,6),
      'featured_img' => $faker->image($path, 300, 300, 'food',false),
      'stock'=>$faker->numberBetween(1,20),
    ];
});
