<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BiayaAdmin;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $meja = Meja::where('status', 'tersedia')->get();
        return view('landing', compact('meja'));
    }

    public function formBooking(Meja $meja)
    {
        if (!Auth::check()) {
            return redirect()->route('google.redirect');
        }

        return view('booking.form', compact('meja'));
    }


    public function storeBooking(Request $request, Meja $meja)
    {
        $request->validate([
            'tanggal_booking' => 'required|date',
            'jam_booking' => 'required',
            'payment_method' => 'required'
        ]);

        // Ambil biaya admin default (misal id 1)
        $biayaAdmin = BiayaAdmin::first();
        $adminFee = $biayaAdmin ? $biayaAdmin->nominal : 1500;

        // Hitung harga
        $harga = $meja->harga_promo ?? $meja->harga_normal;

        // Simpan booking
        $booking = Booking::create([
            'user_id' => Auth::id(), // atau null kalau public tanpa login
            'meja_id' => $meja->id,
            'tanggal_booking' => $request->tanggal_booking,
            'jam_booking' => $request->jam_booking,
            'total_harga' => $harga,
            'biaya_admin' => $adminFee,
            'total_pembayaran' => $harga + $adminFee,
            'payment_method' => $request->payment_method,
            'status' => 'Pending'
        ]);

        // Redirect ke payment page
        return redirect()->route('payment.pay', $booking->id);
    }
}
