@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-4">Pembayaran Booking</h2>

    <div class="mb-4">
        <p><strong>ID Booking:</strong> {{ $booking->id }}</p>
        <p><strong>Nama:</strong> {{ $booking->user->name }}</p>
        <p><strong>Total Bayar:</strong> Rp{{ number_format($booking->total_pembayaran, 0, ',', '.') }}</p>
    </div>

    <button id="pay-button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
        Bayar Sekarang
    </button>

    <p class="text-gray-500 text-sm mt-4">Klik tombol di atas untuk melanjutkan pembayaran via Midtrans.</p>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function () {
    window.snap.pay('{{ $snapToken }}', {
      onSuccess: function(result){
        alert("Pembayaran sukses!");
        window.location.href = "/";
      },
      onPending: function(result){
        alert("Menunggu pembayaran...");
      },
      onError: function(result){
        alert("Pembayaran gagal.");
      }
    });
  };
</script>
@endsection