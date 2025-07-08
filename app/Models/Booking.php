<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    protected $fillable = [
        'user_id',
        'meja_id',
        'tanggal_booking',
        'jam_booking',
        'total_harga',
        'biaya_admin',
        'total_pembayaran',
        'payment_method',
        'payment_link',
        'status',
        'paid_at',
    ];

    protected $dates = ['tanggal_booking', 'paid_at'];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Meja
    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }

    // Relasi ke Payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
