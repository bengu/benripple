<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert(array(
            'email' => 'benjamingustafsson@gmail.com',
            'password' => Hash::make('master'),
	    'username' => 'Daxia',
	    'name' => 'Benjamin Gustafsson',
	    'privatperson' => true
        ));

	DB::table('users')->insert(array(
            'email' => 'ben@gmail.com',
            'password' => Hash::make('master'),
	    'username' => 'Daxia2',
	    'name' => 'Dalervalutan'
        ));

DB::table('users')->insert(array(
            'email' => 'gu@gmail.com',
            'password' => Hash::make('master'),
	    'username' => 'Daxia3',
	    'name' => 'Kalle Svensson',
	    'privatperson' => true
        ));
DB::table('users')->insert(array(
            'email' => 'gus@gmail.com',
            'password' => Hash::make('master'),
	    'username' => 'Daxia4',
	    'name' => 'Anders Johansson',
	    'privatperson' => true
        ));
    }
}
