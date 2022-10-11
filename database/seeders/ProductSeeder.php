<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Smart Phone',
            'slug' => 'smart-phone',
            'qty' => '30',
            'image' => 'zero/digital_01.jpg',
            'color' => 'White',
            'weight' => '500 Grams',
            'price' => '2000000',
            'cate_id' => '1',
            'dimension' => '4cm',
            'seller_id' =>'1',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'I-Phone',
            'slug' => 'i-phone',
            'qty' => '30',
            'image' => 'zero/digital_02.jpg',
            'color' => 'White',
            'weight' => '500 Grams',
            'price' => '4000000',
            'cate_id' => '1',
            'dimension' => '4cm',
            'seller_id' =>'1',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Radio',
            'slug' => 'radio',
            'qty' => '30',
            'image' => 'zero/digital_03.jpg',
            'color' => 'White',
            'weight' => '900 Grams',
            'price' => '1000000',
            'cate_id' => '1',
            'dimension' => '123cm',
            'seller_id' =>'1',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Laptop',
            'slug' => 'laptop',
            'qty' => '30',
            'image' => 'zero/digital_04.jpg',
            'color' => 'White',
            'weight' => '1.5 kg',
            'price' => '8000000',
            'cate_id' => '1',
            'dimension' => '250cm',
            'seller_id' =>'1',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Touch Phone',
            'slug' => 'touch-phone',
            'qty' => '30',
            'image' => 'zero/digital_05.jpg',
            'color' => 'White',
            'weight' => '700 Grams',
            'price' => '3000000',
            'cate_id' => '1',
            'dimension' => '4cm',
            'seller_id' =>'1',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Digital Cam',
            'slug' => 'digital-cam',
            'qty' => '30',
            'image' => 'zero/digital_06.jpg',
            'color' => 'White',
            'weight' => '500 Grams',
            'price' => '2000000',
            'cate_id' => '1',
            'dimension' => '4cm',
            'seller_id' =>'1',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'CCTV',
            'slug' => 'cctv',
            'qty' => '30',
            'image' => 'zero/digital_07.jpg',
            'color' => 'White',
            'weight' => '500 Grams',
            'price' => '250000',
            'cate_id' => '1',
            'dimension' => '4cm',
            'seller_id' =>'1',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Smart TV',
            'slug' => 'smart-tv',
            'qty' => '30',
            'image' => 'zero/digital_08.jpg',
            'color' => 'White',
            'weight' => '5 Kilo Grams',
            'price' => '5000000',
            'cate_id' => '1',
            'dimension' => '250cm',
            'seller_id' =>'1',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Small TV',
            'slug' => 'small-tv',
            'qty' => '30',
            'image' => 'zero/digital_09.jpg',
            'color' => 'White',
            'weight' => '4 Kilo Grams',
            'price' => '4500000',
            'cate_id' => '1',
            'dimension' => '200cm',
            'seller_id' =>'1',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Xbox-360 Controller',
            'slug' => 'xbox-360-controller',
            'qty' => '30',
            'image' => 'zero/digital_10.jpg',
            'color' => 'White',
            'weight' => '500 Grams',
            'price' => '150000',
            'cate_id' => '1',
            'dimension' => '4cm',
            'seller_id' =>'1',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        /**
         *
         *
         *
         *
         *
         *
         *
         *
         *
         *
         *
         */
        Product::create([
            'name' => 'Casio Watch',
            'slug' => 'casio-watch',
            'qty' => '30',
            'image' => 'dewa/fashion_01.jpg',
            'color' => 'Brown',
            'weight' => '100 Grams',
            'price' => '150000',
            'cate_id' => '2',
            'dimension' => '1cm',
            'seller_id' =>'2',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Black Bag',
            'slug' => 'black-bag',
            'qty' => '30',
            'image' => 'dewa/fashion_02.jpg',
            'color' => 'Black',
            'weight' => '450 Grams',
            'price' => '50000',
            'cate_id' => '2',
            'dimension' => '6cm',
            'seller_id' =>'2',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Shorts',
            'slug' => 'shorts',
            'qty' => '30',
            'image' => 'dewa/fashion_03.jpg',
            'color' => 'Blue',
            'weight' => '50 Grams',
            'price' => '50000',
            'cate_id' => '2',
            'dimension' => '2cm',
            'seller_id' =>'2',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Smart Watch',
            'slug' => 'smart-watch',
            'qty' => '30',
            'image' => 'dewa/fashion_04.jpg',
            'color' => 'Black',
            'weight' => '50 Grams',
            'price' => '250000',
            'cate_id' => '2',
            'dimension' => '1cm',
            'seller_id' =>'2',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Jordan Shoes',
            'slug' => 'jordan-shoes',
            'qty' => '30',
            'image' => 'dewa/fashion_05.jpg',
            'color' => 'Brown',
            'weight' => '100 Grams',
            'price' => '150000',
            'cate_id' => '2',
            'dimension' => '2cm',
            'seller_id' =>'2',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Office Tie',
            'slug' => 'office-tie',
            'qty' => '30',
            'image' => 'dewa/fashion_06.jpg',
            'color' => 'Blue',
            'weight' => '5 Grams',
            'price' => '30000',
            'cate_id' => '2',
            'dimension' => '1cm',
            'seller_id' =>'2',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Winie T-Shirt',
            'slug' => 'winie-t-shirt',
            'qty' => '30',
            'image' => 'dewa/fashion_07.jpg',
            'color' => 'Midnight Blue',
            'weight' => '100 Grams',
            'price' => '60000',
            'cate_id' => '2',
            'dimension' => '15cm',
            'seller_id' =>'2',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Simple Bag',
            'slug' => 'simple-bag',
            'qty' => '30',
            'image' => 'dewa/fashion_08.jpg',
            'color' => 'Cream',
            'weight' => '100 Grams',
            'price' => '150000',
            'cate_id' => '2',
            'dimension' => '24cm',
            'seller_id' =>'2',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Ailen Shirt',
            'slug' => 'ailen-shirt',
            'qty' => '30',
            'image' => 'dewa/fashion_09.jpg',
            'color' => 'Blue',
            'weight' => '50 Grams',
            'price' => '120000',
            'cate_id' => '2',
            'dimension' => '26cm',
            'seller_id' =>'2',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
        Product::create([
            'name' => 'Boot Shoes',
            'slug' => 'boot-shoes',
            'qty' => '30',
            'image' => 'dewa/fashion_10.jpg',
            'color' => 'Brown',
            'weight' => '100 Grams',
            'price' => '70000',
            'cate_id' => '2',
            'dimension' => '12cm',
            'seller_id' =>'2',
            'description' => 'Some Good Testing Products',
            'status' => 'true',
            'popular' => 'true',
        ]);
    }
}
