<?php

use Illuminate\Contracts\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03/08/2016
 * Time: 19:36
 */
class UserTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        $faker = Faker::create();

        /*      User::create([
                  'name' => 'admin',
                  'email' => 'weber.ismael@gmail.com',
                  'password' => Hash::make('senha123')
              ]);


                      foreach (range(1, 10) as $i) {

                          User::create([
                              'name' => $faker->name(),
                              'email' => $faker->email(),
                              'password' => Hash::make($faker->word)

                          ]);
                      }
                      */

        factory('CodeCommerce\User')->create([
            'name' => 'admin',
            'email' => 'weber.ismael@gmail.com',
            'password' => Hash::make('senha123')
        ]);

        factory('CodeCommerce\User', 15)->create();
    }

}