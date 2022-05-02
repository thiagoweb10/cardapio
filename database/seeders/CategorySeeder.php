<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([
                    'Bebidas Alcoolicas',
                    'Bebibdas Não alcoolicas',
                    'Japonesa',
                    'Fast Food',
                    'Brasileira',
                    'Sobremesa'] as  $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
