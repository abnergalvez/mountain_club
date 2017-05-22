<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('users')->insert([
        [
          'name' => 'Administrador',
          'last_name' => 'Club',
          'email' => 'admin@clubpiramide.cl',
          'password' => bcrypt('Piramide2017'),
          'role' => 'admin'
        ],
        [
          'name' => 'Socio',
          'last_name' => 'Club',
          'email' => 'socio@mail.com',
          'password' => bcrypt('Piramide2017'),
          'role' => 'member'
        ]
      ]);
    }
}
