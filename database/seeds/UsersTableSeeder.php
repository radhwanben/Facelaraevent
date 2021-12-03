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
         DB::table('users')->insert([
             'name' => 'User1',
             'email' => 'user1@example.com',
             'password' => '$2y$10$0CqE/tWQz0ngiMvNxSJUJ.E1Tbh/Pzk5tTQUClS5fZFXA8tnBtw22',
         ]);
     }
 }
