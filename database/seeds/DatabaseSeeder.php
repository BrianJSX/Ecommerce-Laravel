<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'minh',
            'email' =>'minh@gmail.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => '',
            'remember_token' => ''
        ]);
    }
}
