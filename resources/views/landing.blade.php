@extends('layouts.app')

@section('content')

<div class="text-center py-12">
    <h1 class="text-4xl font-bold text-blue-600 mb-4">Booking Meja Billiard Online</h1>
    <p class="text-gray-600 text-lg">Pilih meja, atur waktu booking, dan bayar langsung via Midtrans.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($meja as $m)
    <div class="bg-white rounded-lg shadow p-4">
        <h2 class="text-2xl font-bold mb-2">Meja {{ $m->nama_meja }}</h2>
        @if($m->harga_promo)
        <p class="text-red-500 font-bold text-xl mb-1">Rp{{ number_format($m->harga_promo, 0, ',', '.') }}</p>
        <p class="text-gray-500 line-through">Rp{{ number_format($m->harga_normal, 0, ',', '.') }}</p>
        @else
        <p class="text-blue-600 font-bold text-xl mb-2">Rp{{ number_format($m->harga_normal, 0, ',', '.') }}</p>
        @endif

        <a href="{{ route('booking.form', $m->id) }}"
            class="block mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-center">
            Booking Sekarang
        </a>
    </div>
    @endforeach
</div>

@endsection