<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
        ]);

        $buyers = User::where('role', 'buyer')->get();
        foreach ($buyers as $buyer) {
            Review::create([
                'user_id' => $buyer->id,
                'rating' => rand(1, 5),
                'comment' => "Makanan di toko ini selalu membuat saya teringat akan masakan nenek saya. Rasanya otentik dan penuh cinta.",
            ]);
        }
    }
}