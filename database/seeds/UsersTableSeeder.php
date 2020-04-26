<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'TheCaesious',
                'email' => 'info@thecaesious.com',
                'password' => bcrypt('secret'),
            ]
        ];
        DB::table('users')->insert($users);
    }
}
