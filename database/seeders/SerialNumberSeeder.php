<?php

namespace Database\Seeders;

use App\Models\SerialNumber;
use Illuminate\Database\Seeder;

class SerialNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serial_numbers = [
            [
                'product_id' => '1',
                'serial_number' => rand(100000,999999),
                'prod_date' => '2023-01-01',
                'waranty_start' => '2023-05-18',
                'waranty_duration' => '1 Year',
                'price' => 8000000
            ],
            [
                'product_id' => '1',
                'serial_number' => rand(100000,999999),
                'prod_date' => '2023-01-01',
                'waranty_start' => '2023-05-18',
                'waranty_duration' => '1 Year',
                'price' => 8000000
            ],
            [
                'product_id' => '2',
                'serial_number' => rand(100000,999999),
                'prod_date' => '2023-01-01',
                'waranty_start' => '2023-05-18',
                'waranty_duration' => '1 Year',
                'price' => 7000000
            ],
            [
                'product_id' => '2',
                'serial_number' => rand(100000,999999),
                'prod_date' => '2023-01-01',
                'waranty_start' => '2023-05-18',
                'waranty_duration' => '1 Year',
                'price' => 7000000
            ],
            [
                'product_id' => '3',
                'serial_number' => rand(100000,999999),
                'prod_date' => '2023-01-01',
                'waranty_start' => '2023-05-18',
                'waranty_duration' => '2 Year',
                'price' => 27000000
            ],
            [
                'product_id' => '3',
                'serial_number' => rand(100000,999999),
                'prod_date' => '2023-01-01',
                'waranty_start' => '2023-05-18',
                'waranty_duration' => '2 Year',
                'price' => 27000000
            ],
        ];
        for ($i = 0; $i < count($serial_numbers); $i++) {
            $serial_number = new SerialNumber();
            $serial_number->product_id = $serial_numbers[$i]['product_id'];
            $serial_number->serial_number = $serial_numbers[$i]['serial_number'];
            $serial_number->prod_date = $serial_numbers[$i]['prod_date'];
            $serial_number->waranty_start = $serial_numbers[$i]['waranty_start'];
            $serial_number->waranty_duration = $serial_numbers[$i]['waranty_duration'];
            $serial_number->price = $serial_numbers[$i]['price'];
            $serial_number->save();
        }
    }
}
