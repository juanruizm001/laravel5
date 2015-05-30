<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

    public function run ()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i ++)
        {
            \DB::table('users')->insert(array(
                'first_name'    => $faker->firstName,
                'last_name'     => $faker->lastName,
                'email'         => $faker->unique()->email,
                'password'      => \Hash::make('123456'),
                'type'          => 'user'
            ));


        }

    }

}