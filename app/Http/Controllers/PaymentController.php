<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function pay(Booking $booking)
    {
        $params = [
            'transaction_details' => [
                'order_id' => 'BOOK-' . $booking->id . '-' . time(),
                'gross_amount' => $booking->total_pembayaran
            ],
            'item_details' => [
                [
                    'id' => 'MEJA-' . $booking->meja_id,
                    'price' => $booking->total_harga,
                    'quantity' => 1,
                    'name' => 'Booking Meja ' . $booking->meja_id
                ],
                [
                    'id' => 'ADMIN-FEE',
                    'price' => $booking->biaya_admin,
                    'quantity' => 1,
                    'name' => 'Biaya Admin'
                ],
            ],
            'customer_details' => [
                'first_name' => $booking->user->name,
                'email' => $booking->user->email
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('payment.pay', compact('snapToken', 'booking'));
    }

    public function callback(Request $request)
    {
        // Tambahkan validasi Signature Key jika perlu

        $serverKey = config('services.midtrans.server_key');
        $json = json_decode($request->getContent());

        // Update status booking di sini berdasarkan order_id & status_code
        // Contoh:
        $bookingId = explode('-', $json->order_id)[1];
        $booking = Booking::find($bookingId);
        if ($json->transaction_status == 'settlement') {
            $booking->status = 'Lunas';
            $booking->paid_at = now();
            $booking->save();
        }

        return response()->json(['message' => 'OK']);
    }
}
