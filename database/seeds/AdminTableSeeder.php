<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder {

    public function run ()
    {
        \DB::table('users')->insert(array(
            'first_name'    => 'Juan',
            'last_name'     => 'Ruiz',
            'email'         => 'juanr@gmail.com',
            'password'      => \Hash::make('123'),
            'type'          => 'admin',
            'full_name'     => 'Juan Ruiz'
        ));

        \DB::table('user_profiles')->insert(array(
            'user_id'   => 1,
            'birthdate' => '1985/02/20'
        ));
    }

}