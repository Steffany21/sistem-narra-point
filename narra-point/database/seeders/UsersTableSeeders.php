<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'name'=>'narra',
        //     'username'=>'admin1',
        //     'email'=>'narra@gmail.com',
        //     'password'=>Hash::make('admin123')
        // ]);

        // Define sample user data
        $users = [
            [
                'name' => 'John Doe',
                'username' => 'johndoe', // Make sure to provide a value for 'username'
                'email' => 'johndoe@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'username' => 'janesmith', // Make sure to provide a value for 'username'
                'email' => 'janesmith@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more sample users as needed
        ];

        // Insert data into 'users' table
        DB::table('users')->insert($users);

    }
}
