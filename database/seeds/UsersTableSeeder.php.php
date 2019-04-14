<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('adminpass')
        ]));
    }
}
