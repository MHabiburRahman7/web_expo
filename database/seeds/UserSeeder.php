<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'nama' => str_random('5'), 
            'email'=> str_random('3').'@haha.com', 
            'password' => bcrypt('lols'), 
            'telp' => '083830505098', 
            'kompetisi_id' => 1, 
            'is_admin' => 1, 
            'status_id' => 1,
            ]);
    }
}
