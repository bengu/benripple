<?php

class CreditlineTableSeeder extends Seeder {

    public function run()
    {
        DB::table('creditlines')->delete();

	//DB::insert('insert into creditlines (from, to) values (?, ?)', array(1, 2));

	Creditline::create(array(
		'from' => 1,
		'to'  => 2,
		'amount' => 11,
		'good_id' => 1
));

Creditline::create(array(
		'from' => 1,
		'to'  => 3,
		'amount' => 15,
		'good_id' => 1
));

Creditline::create(array(
		'from' => 2,
		'to'  => 3,
		'amount' => 10,
		'good_id' => 1
));

Creditline::create(array(
		'from' => 3,
		'to'  => 4,
		'amount' => 20,
		'good_id' => 1
));
    }
}