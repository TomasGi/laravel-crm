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
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => 'a@e.com',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Manager',
                'email' => 'm@e.com',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Worker',
                'email' => 'w@e.com',
                'password' => bcrypt('12345678')
            ]);
    }
}
