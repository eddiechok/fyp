<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //   Product::insert([
      //     [
      //     'code' => 'OP001',
      //     'name' => 'Organic Vegetables',
      //     'description' => 'Fresh and clean vegetables without pesticides.',
      //     'price' => 10.00,
      //     'quantity_on_hand' => 10,
      //     'best_seller' => 1,
      //     'best_deal' => 0,
      //     'new_arrival' => 1,
      //     'category_id' => 2,
      //   ],
      //   [
      //     'code' => 'OP002',
      //     'name' => 'Papaya',
      //     'description' => 'Organic Papaya.',
      //     'price' => 20.00,
      //     'quantity_on_hand' => 15,
      //     'best_seller' => 1,
      //     'best_deal' => 0,
      //     'new_arrival' => 0,
      //     'category_id' => 1,
      //   ],
      //   [
      //     'code' => 'OP003',
      //     'name' => 'Grapes',
      //     'description' => 'Organic Grapes directly imported from Japan.',
      //     'price' => 30.00,
      //     'quantity_on_hand' => 20,
      //     'best_seller' => 0,
      //     'best_deal' => 1,
      //     'new_arrival' => 1,
      //     'category_id' => 1,
      //   ]
      // ]);


        //Fruits
        for($i = 1; $i <= 30; $i++) {
          Product::create([
            'code' => 'FRT00'.$i,
            'name' => 'Fruits-'.$i,
            'description' => 'Organic Fruits'.$i,
            'price' => rand(10, 100),
            'quantity_on_hand' =>rand(10, 100),
            'img_default' => 'products/FRT00'.$i.'.jpg',
            'best_seller' => rand(0, 1),
            'best_deal' => rand(0, 1),
            'new_arrival' => rand(0, 1),
            'category_id' => 1,
          ]);
        }

        //Vegetables
        for($i = 1; $i <= 30; $i++) {
          Product::create([
            'code' => 'VGT00'.$i,
            'name' => 'Vegetable-'.$i,
            'description' => 'Organic Vegetable'.$i,
            'price' => rand(10, 100),
            'quantity_on_hand' =>rand(10, 100),
            'img_default' => 'products/VGT00'.$i.'.jpg',
            'best_seller' => rand(0, 1),
            'best_deal' => rand(0, 1),
            'new_arrival' => rand(0, 1),
            'category_id' => 2,
          ]);
        }
    }
}
