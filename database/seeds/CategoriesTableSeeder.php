<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Uncategorized', 'Personal', 'Business', 'Coding', 'Career'];

        array_map(function ($cat)
        {
          App\Category::create([
            'title' => $cat
          ]);
        }, $categories);

    }
}
