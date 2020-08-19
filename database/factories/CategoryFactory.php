<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $path = storage_path('app/public/products');
    return [
        'name'=>$faker->word,
        'featured_img'=>$faker->image($path, 300, 300, 'food',false),
    ];
});
