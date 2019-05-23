<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        // User::truncate();

        // $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and 
        // let's hash it before the loop, or else our seeder 
        // will be too slow.
        $password = Hash::make('123456');

            User::create([
                'user_name' => 'admin',
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => $password,
                'mobile' => '01110874146',
                'role' => '1',
                'status' => '1',
            ]);

            User::create([
                'user_name' => 'manager',
                'name' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => $password,
                'mobile' => '01110874156',
                'role' => '2',
                'status' => '1',
            ]);

            User::create([
                'user_name' => 'employee',
                'name' => 'employee',
                'email' => 'employee@gmail.com',
                'password' => $password,
                'mobile' => '01110874155',
                'role' => '3',
                'status' => '1',
            ]);

    }
}
