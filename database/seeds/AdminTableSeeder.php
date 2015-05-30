<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder {

    public function run ()
    {
        \DB::table('users')->insert(array(
            'first_name'    => 'Juan',
            'last_name'     => 'Juan',
            'email'         => 'juanr@gmail.com',
            'password'      => \Hash::make('123'),
            'type'          => 'admin'
        ));
    }

}