<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $makanan = Category::where('name', 'Makanan')->first();
        $minuman = Category::where('name', 'Minuman')->first();
        $jajanan = Category::where('name', 'Jajanan')->first();

        Product::create([
            'name' => 'Gudeg',
            'description' => 'Gudeg khas Yogyakarta dengan nangka muda dan ayam kampung',
            'price' => 50000,
            'image' => 'gudeg.jpg',
            'origin_region' => 'Yogyakarta',
            'category_id' => $makanan->id,
        ]);

        Product::create([
            'name' => 'Soto Betawi',
            'description' => 'Soto Betawi dengan kuah santan dan daging sapi',
            'price' => 40000,
            'image' => 'soto_betawi.jpg',
            'origin_region' => 'Jakarta',
            'category_id' => $makanan->id,
        ]);

        Product::create([
            'name' => 'Es Cendol',
            'description' => 'Minuman segar dengan cendol dan santan',
            'price' => 15000,
            'image' => 'es_cendol.jpg',
            'origin_region' => 'Jawa Barat',
            'category_id' => $minuman->id,
        ]);

        Product::create([
            'name' => 'Kopi Tubruk',
            'description' => 'Kopi tradisional Indonesia dengan ampas kopi',
            'price' => 10000,
            'image' => 'kopi_tubruk.jpg',
            'origin_region' => 'Jawa',
            'category_id' => $minuman->id,
        ]);

        Product::create([
            'name' => 'Klepon',
            'description' => 'Jajanan manis dengan gula merah dan kelapa parut',
            'price' => 12000,
            'image' => 'klepon.jpg',
            'origin_region' => 'Jawa',
            'category_id' => $jajanan->id,
        ]);

        Product::create([
            'name' => 'Kue Lapis',
            'description' => 'Kue lapis legit khas Indonesia',
            'price' => 20000,
            'image' => 'kue_lapis.jpg',
            'origin_region' => 'Indonesia',
            'category_id' => $jajanan->id,
        ]);
    }
}