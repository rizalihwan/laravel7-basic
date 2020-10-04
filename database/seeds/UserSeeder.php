<?php

use Illuminate\Database\Seeder;
use \App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Santuy',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('password')
        ]);
    }
}
