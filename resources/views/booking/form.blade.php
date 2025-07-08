@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-4">Booking Meja {{ $meja->nama_meja }}</h2>

    <form action="{{ route('booking.store', $meja->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Tanggal Booking</label>
            <input type="date" name="tanggal_booking" class="mt-1 p-2 border rounded w-full" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Jam Booking</label>
            <input type="time" name="jam_booking" class="mt-1 p-2 border rounded w-full" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Metode Pembayaran</label>
            <select name="payment_method" class="mt-1 p-2 border rounded w-full" required>
                <option value="midtrans_direct">Bayar Sekarang</option>
                <option value="midtrans_by_admin">Bayar di Tempat (via QRIS)</option>
            </select>
        </div>

        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Lanjutkan
        </button>
    </form>
</div>

@endsection