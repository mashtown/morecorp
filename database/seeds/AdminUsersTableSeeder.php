<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        \App\User::create(array(
            'name' => 'Chris Joe',
            'email' => 'admin@morecorp.com',
            'password' => bcrypt('password')
        ));

        \App\User::create(array(
            'name' => 'John Doe',
            'email' => 'john@morecorp.com',
            'password' => bcrypt('password')
        ));
    }
}
