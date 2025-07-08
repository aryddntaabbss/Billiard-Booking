<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        Booking::create([
            'user_id' => 1,
            'meja_id' => 1,
            'tanggal_booking' => now()->toDateString(),
            'jam_booking' => '19:00:00',
            'total_harga' => 25000,
            'biaya_admin' => 1500,
            'total_pembayaran' => 26500,
            'payment_method' => 'midtrans_direct',
            'status' => 'Pending'
        ]);
    }
}
