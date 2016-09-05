<?php

use Illuminate\Contracts\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
use Faker\Factory as Faker;
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03/08/2016
 * Time: 19:36
 */
class CategoryTableSeeder extends \Illuminate\Database\Seeder
{
    public function run(){
        DB::table('categories')->truncate();

/*        Category::create([
            'name' => 'Category 1',
            'description' => 'Description Category 1'
        ]);

        Category::create([
            'name' => 'Category 2',
            'description' => 'Description Category 2'
        ]);
*/
/*
    $faker = Faker::create();

        foreach (range(1,15) as $i){

            Category::create([
                'name' => $faker->word(),
                'description' => $faker->sentence()
            ]);
        }
*/
        factory('CodeCommerce\Category', 40)->create();
    }

}