<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;

    protected $table = 'meja';

    protected $fillable = [
        'nama_meja',
        'harga_normal',
        'harga_promo',
        'status',
    ];
}
