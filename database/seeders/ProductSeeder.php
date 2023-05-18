<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'product_name' => 'Mi Mix 3 5G',
                'brand' => 'Xiaomi',
                'price' => 8000000,
                'model_number' => 'MI-MIX3-5G',
                'image' => 'mi-mix-3-5g.jpg'
            ],
            [
                'product_name' => 'Galaxy S21 5G',
                'brand' => 'Samsung',
                'price' => 7000000,
                'model_number' => 'GALAXY-S21-5G',
                'image' => 'galaxy-s21-5g.jpg'
            ],
            [
                'product_name' => 'Iphone 14 Pro Max',
                'brand' => 'Apple',
                'price' => 27000000,
                'model_number' => 'IPHONE-14-PRO-MAX',
                'image' => 'iphone-14-pro-max.jpg'
            ],
        ];
        $arrLength = count($products);
        for ($i = 0; $i < $arrLength; $i++) {
            $product = new Product();
            $product->product_name = $products[$i]['product_name'];
            $product->brand = $products[$i]['brand'];
            $product->price = $products[$i]['price'];
            $product->model_number = $products[$i]['model_number'];
            $product->image = $products[$i]['image'];
            $product->save();
        }
    }
}
