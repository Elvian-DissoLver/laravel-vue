<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("products")->delete();
        Product::create([
            'name' => 'Product A',
            'price' => 100.00,
        ]);

        Product::create([
            'name' => 'Product B',
            'price' => 150.00,
        ]);

        Product::create([
            'name' => 'Product C',
            'price' => 200.00,
        ]);
    }
}
