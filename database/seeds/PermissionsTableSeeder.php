<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert(
            [
                'name' => 'create user manager',
                'guard_name' => 'web'
            ],
            [
                'name' => 'create user worker',
                'guard_name' => 'web'
            ],
            [
                'name' => 'create task',
                'guard_name' => 'web'
            ]
        );
    }
}
