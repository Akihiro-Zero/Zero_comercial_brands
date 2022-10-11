<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Categories::create([
            'name' => 'Digital Products',
            'slug' => 'digital-products',
            'description' => 'All kinds of digital product',
            'image' => 'categories-image/main-slider-1-1.jpg',
            'popular' => 'true',
        ]);
        Categories::create([
            'name' => 'Fashion Products',
            'slug' => 'fashion-products',
            'description' => 'All kinds of fashion product',
            'image' => 'categories-image/main-slider-1-2.jpg',
            'popular' => 'true',
        ]);
    }
}
