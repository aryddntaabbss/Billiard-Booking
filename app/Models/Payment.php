<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';

    protected $fillable = [
        'booking_id',
        'kode_transaksi',
        'metode',
        'gross_amount',
        'status',
        'paid_at',
    ];
}
