<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([

        'first_name' => 'admin',
        'last_name' => 'admin',
        'email' => 'admin@admin.com',
        'password' => '$2a$04$yFHQomp6QfcZpQDwF5Gj5egp8yKTa3rG3Qs54gyTGdBzqlKdwbh8G',
        'gender' => 'Female' ,
        'date_of_birth' => '1960-12-17',
        'mobile_number' => '201111111111',
        'created_at' => '2021-06-09 17:57:23',
        'updated_at' => '2021-06-09 17:57:23'
]);
 

    }
}



