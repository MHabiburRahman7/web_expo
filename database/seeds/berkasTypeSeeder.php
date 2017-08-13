<?php

use Illuminate\Database\Seeder;

class berkasTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('berkasType')->insert([
            'nama' => 'payment',
            'kompetisi_id' => 0,
            ]);
    }
}
