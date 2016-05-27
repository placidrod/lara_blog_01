<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $roleNames = ['Subsciber', 'Author', 'Editor', 'Admin'];

    array_map(function ($name)
    {
      App\Role::create(['name' => $name]);
    }, $roleNames);
  }
}
