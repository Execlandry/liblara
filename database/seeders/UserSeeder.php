<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::insert([
            ['name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password')],

            ['name' => 'Editor',
            'email' => 'editor@gmail.com',
            'password' => bcrypt('password')],

            ['name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')],
        ]);
    }
}
