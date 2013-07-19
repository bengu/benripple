<?php

class CreditlineTableSeeder extends Seeder {

    public function run()
    {
        DB::table('creditlines')->delete();

	//DB::insert('insert into creditlines (from, to) values (?, ?)', array(1, 2));

	Creditline::create(array(
		'from' => 1,
		'to'  => 2,
		'good_id' => 1,
		'private' => false,
		'dividend' => false,
		'balance' => 0,
		'trust' => 11 
));

Creditline::create(array(
		'from' => 1,
		'to'  => 3,
		'balance' => 0,
		'trust' => 15, 
		'good_id' => 1
));

Creditline::create(array(
		'from' => 2,
		'to'  => 3,
		'balance' => 0,
		'trust' => 10, 
		'good_id' => 1
));

Creditline::create(array(
		'from' => 3,
		'to'  => 4,
		'balance' => 0,
		'trust' => 20, 
		'good_id' => 1
));
    }
}
