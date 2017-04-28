<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('users')->insert([
        [
          'name' => 'Abner',
          'last_name' => 'Galvez',
          'email' => 'agc005@gmail.com',
          'password' => bcrypt('abnerosk8'),
          'role' => 'admin'
        ],
        [
          'name' => 'Miembro',
          'last_name' => 'Club',
          'email' => 'miembro@mail.com',
          'password' => bcrypt('miembro1234'),
          'role' => 'member'
        ]
      ]);
    }
}
