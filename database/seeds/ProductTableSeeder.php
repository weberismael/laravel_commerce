<?php

use Illuminate\Contracts\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends \Illuminate\Database\Seeder
{
    public function run(){

        DB::table('products')->truncate();

        $faker = Faker::create();

        foreach (range(1,40) as $i){
            Product::create([
                'name' => $faker->word(),
                'description' => $faker->sentence(),
                'price' => $faker->randomNumber(2),
                'featured' => $faker->numberBetween(0,1),
                'recommend' => $faker->numberBetween(0,1),
                'category_id' => $faker->numberBetween(1,15)
            ]);
        }

    }

}