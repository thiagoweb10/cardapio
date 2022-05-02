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
        Product::create([
            'category_id' => 1,
            'code' => '01',
            'photo' => 'black_label.png',
            'name' => 'Black Label',
            'description' => 'Black Label: Blue ou Red',
            'price' => '100.00'
        ]);

        Product::create([
            'category_id' => 2,
            'code' => '02',
            'photo' => 'black_label.png',
            'name' => 'Fanta laranja',
            'description' => 'Fanta Laranja: 600 ml ',
            'price' => '10.00'
        ]);

        Product::create([
            'category_id' => 3,
            'code' => '03',
            'photo' => 'yakisoba.jpg',
            'name' => 'Yakisoba',
            'description' => 'Tamanho único',
            'price' => '50.00'
        ]);

        Product::create([
            'category_id' => 4,
            'code' => '04',
            'photo' => 'mcdonalds.jpg',
            'name' => 'McDonalds',
            'description' => 'McDonalds',
            'price' => '25.00'
        ]);

        Product::create([
            'category_id' => 5,
            'code' => '04',
            'photo' => 'mcdonalds.jpg',
            'name' => 'Baião de 2',
            'description' => 'Baião de 2: Tamanho único.',
            'price' => '35.00'
        ]);
    }
}