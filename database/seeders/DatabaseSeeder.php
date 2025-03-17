<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RoleSeeder::class,
        ]);
        DB::table('stores')->insert([
            [
                'user_id' => 1,
                'logo' => 'logos/store1.png',
                'name' => 'Toko Sukses Jaya',
                'slug' => Str::slug('Toko Sukses Jaya'),
                'description' => 'Menjual berbagai kebutuhan rumah tangga.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'logo' => 'logos/store2.png',
                'name' => 'Grosir Murah Meriah',
                'slug' => Str::slug('Grosir Murah Meriah'),
                'description' => 'Menyediakan barang grosir dengan harga terbaik.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'logo' => 'logos/store3.png',
                'name' => 'Fashion Trendy',
                'slug' => Str::slug('Fashion Trendy'),
                'description' => 'Menjual pakaian dengan model terbaru dan berkualitas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'logo' => 'logos/store4.png',
                'name' => 'Elektronik Center',
                'slug' => Str::slug('Elektronik Center'),
                'description' => 'Pusat penjualan barang elektronik terpercaya.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'logo' => 'logos/store5.png',
                'name' => 'Toko Buku Pintar',
                'slug' => Str::slug('Toko Buku Pintar'),
                'description' => 'Menyediakan berbagai buku berkualitas untuk semua usia.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
