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
      App\User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('placid'),
        'role_id' => 4
      ]);

      App\User::create([
        'name' => 'Editor',
        'email' => 'editor@example.com',
        'password' => bcrypt('placid'),
        'role_id' => 3
      ]);

      App\User::create([
        'name' => 'Author1',
        'email' => 'author1@example.com',
        'password' => bcrypt('placid'),
        'role_id' => 2
      ]);

      App\User::create([
        'name' => 'Author2',
        'email' => 'author2@example.com',
        'password' => bcrypt('placid'),
        'role_id' => 2
      ]);

      App\User::create([
        'name' => 'Subscriber',
        'email' => 'subs@example.com',
        'password' => bcrypt('placid'),
        'role_id' => 1
      ]);
    }
}
