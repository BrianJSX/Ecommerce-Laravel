<?php

use Illuminate\Database\Seeder;

class seeding extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'minh',
            'email' =>'minh@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
