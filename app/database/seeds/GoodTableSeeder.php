<?php

class GoodTableSeeder extends Seeder {

    public function run()
    {
        DB::table('goods')->delete();

        DB::table('goods')->insert(array(
            'description' => 'SEK',

        ));

	DB::table('goods')->insert(array(
            'description' => 'DKK',

        ));

	DB::table('goods')->insert(array(
            'description' => '(Timmar)',

        ));
    }
}
