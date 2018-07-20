<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
          [
          'slug' => 'fruits',
          'name' => 'Fruits',
          'description' => 'Fruits Category',
        ],
        [
        'slug' => 'vegetables',
        'name' => 'Vegetables',
        'description' => 'Vegetables Category'
      ],
      [
        'slug' => 'dry-food',
        'name' => 'Dry Food',
        'description' => 'Food that is dry'
      ]]);
    }
}
