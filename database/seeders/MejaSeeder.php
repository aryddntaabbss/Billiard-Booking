<?php

namespace Database\Seeders;

use App\Models\Meja;
use Illuminate\Database\Seeder;

class MejaSeeder extends Seeder
{
    public function run(): void
    {
        Meja::insert([
            ['nama_meja' => 'Meja 1', 'harga_normal' => 25000, 'harga_promo' => 20000, 'status' => 'tersedia'],
            ['nama_meja' => 'Meja 2', 'harga_normal' => 30000, 'harga_promo' => null, 'status' => 'tersedia'],
            ['nama_meja' => 'Meja 3', 'harga_normal' => 35000, 'harga_promo' => null, 'status' => 'tidak tersedia'],
        ]);
    }
}
